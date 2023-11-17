import {useState} from "react"

import {useStateContext} from "../context/ContextProvider.jsx";
import axiosClient from "../axios-client.js";

export default function FormRequest() {
  const {user, setNotification} = useStateContext();

  const [startDateInput, setStartDateInput] = useState(0);
  const [endDateInput, setEndDateInput] = useState(0);
  const [reasonInput, setReasonInput] = useState(0);
  const [typeRequestInput, setTypeRequestInput] = useState('expected');
  function submitForm() {
    axiosClient.post(`/user/post-form`, {
      request_type: typeRequestInput,
      start_date: startDateInput,
      end_date: endDateInput,
      employee_id: localStorage.getItem('userId'),
      reason: reasonInput
    })
      .then(response => {
        setNotification(response.data)
      })
  }

  function handleSetStartDateInput(e) {
    setStartDateInput(e.target.value);
  }
  function handleSetTypeRequestInput(e) {
    setTypeRequestInput(e.target.value);
  }
  function handleSetEndDateInput(e) {
    setEndDateInput(e.target.value);
  }
  function handleReasonInput(e) {
    setReasonInput(e.target.value);
  }
  return (
    <div className="flex justify-center flex-row">
      <form className="w-1/2">
        <div><input id="name" name="name" value={user.name} type="text" disabled/></div>
        <div className="mb-3">
          <div className="flex">
            <div className="w-1/2">
              <label htmlFor="start_date">From</label>
              <input type="date" id="start_date" name="start_date" onChange={handleSetStartDateInput}/>
            </div>
            <div className="w-1/2">
              <label htmlFor="end_date">To</label>
              <input type="date" id="end_date" name="end_date" onChange={handleSetEndDateInput} />
            </div>
          </div>
          <select onChange={handleSetTypeRequestInput} className="form-select type-form" name="type" aria-label="Default select example">
            <option value="unexpected">Unexpected</option>
            <option value="expected" selected>Expected</option>
          </select>
          <div><label htmlFor="reason">Reason</label></div>
          <div><textarea rows="3" className="w-100" id="reason" name="reason" onChange={handleReasonInput}></textarea></div>
        </div>
        <div className="d-flex justify-content-center">
          <button onClick={submitForm} type="button" className="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  )
}
