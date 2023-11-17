import { useEffect, useState } from "react";
import { Table } from 'react-bootstrap';
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";
import Badge from "react-bootstrap/Badge";

export function RequestsPage()
{
  const {user} = useStateContext();
    const [requests, setRequests] = useState([]);

    useEffect(()=>{
      axiosClient.get(`/user/forms?id=${localStorage.getItem('userId')}`)
        .then(response => {
          const data = response.data

          setRequests([...requests, ...data]);
        })
    }, []);

    return (
        <Table striped bordered hover>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                {requests.map((request) => {
                    return (
                        <tr key={request.id}>
                            <td>{request.id}</td>
                            <td>{request.reason}</td>
                            <td>{request.start_date}</td>
                            <td>{request.end_date}</td>
                            <td className="d-flex justify-content-center align-items-center h-100">
                                { request.status === 'pending' && <Badge bg="primary">Pending</Badge> }
                                { request.status === 'accepted' && <Badge bg="info">Accepted</Badge> }
                                { request.status === 'reject' && <Badge bg="danger">Rejected</Badge> }
                            </td>
                        </tr>
                    );
                })}
            </tbody>
        </Table >
    );
}

export default RequestsPage;
