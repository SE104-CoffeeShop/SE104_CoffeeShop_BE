import { useEffect, useState } from "react";
import { Table } from 'react-bootstrap';
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import Badge from 'react-bootstrap/Badge';

export function ManagerRequestPage()
{
    const {setNotification} = useStateContext();
    const [reasonInput, setReasonInput] = useState('');
    const [recordSelected, setRecordSelected] = useState(-1);
  const [typeInput, setTypeInput] = useState('reject');
  const [show, setShow] = useState(false);

  function handleReasonInput(e) {
    setReasonInput(e.target.value);
  }

  function handleTypeInput(e) {
    setTypeInput(e.target.value);
  }

  function confirmModal() {
      axiosClient.post(`/user/manager-forms`, {
          form_id: recordSelected,
          type: typeInput,
          reason: reasonInput
      })
          .then(response => {
              setShow(false)
              setNotification(response.data)
              window.location.reload();
          })

  }

  const handleClose = () => setShow(false);
  const handleShow = (recordId) => {
      setRecordSelected(recordId)

      setShow(true)
  };
  const {user} = useStateContext();
    const [requests, setRequests] = useState([]);

    useEffect(()=>{
      axiosClient.get(`/user/manager-forms?id=${localStorage.getItem('userId')}`)
        .then(response => {
          const data = response.data

          setRequests([...requests, ...data]);
        })
    }, []);

    return (
        <div>
          <Modal show={show} onHide={handleClose}>
            <Modal.Header closeButton>
              <Modal.Title>Nhập thông tin</Modal.Title>
            </Modal.Header>
            <Modal.Body>
              <div className="input-group mb-3">
                <label className="input-group-text" id="inputGroup-sizing-default">Reason</label>
                <input onChange={handleReasonInput} type="text" name="reason" className="form-control reason-form mb-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
              </div>
              <select onChange={handleTypeInput} className="form-select type-form" name="type" aria-label="Default select example">
                <option value="reject" selected>Reject</option>
                <option value="accept">Accept</option>
              </select>
            </Modal.Body>
            <Modal.Footer>
              <Button variant="secondary" onClick={handleClose}>
                Close
              </Button>
              <Button variant="primary" onClick={confirmModal}>
                Save Changes
              </Button>
            </Modal.Footer>
          </Modal>
          <Table striped bordered hover>
            <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Employee's Name</th>
                <th scope="col">Reason</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {requests.map((request) => {
              return (
                <tr key={request.id}>
                  <td>{request.id}</td>
                  <td>{request.employee_name}</td>
                  <td>{request.reason}</td>
                    <td>{request.start_date}</td>
                    <td>{request.end_date}</td>
                    <td className="d-flex justify-content-center align-items-center h-100">
                        { request.status === 'pending' && <Badge bg="primary">Pending</Badge> }
                        { request.status === 'accepted' && <Badge bg="info">Accepted</Badge> }
                        { request.status === 'reject' && <Badge bg="danger">Rejected</Badge> }
                    </td>
                  <td>
                    <Button size="sm" variant="primary" onClick={() => handleShow(request.id)}>
                      Action
                    </Button>
                  </td>
                </tr>
              );
            })}
            </tbody>
          </Table >
        </div>
    );
}
