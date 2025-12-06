import { useState } from "react";
import axios from "axios";

export default function CreateUser() {
  const [inputs, setInputs] = useState({});

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((prevValues) => ({ ...prevValues, [name]: value }));
  };

  const handleSubmit = (event) => {
    event.preventDefault();

    axios.post(
      "http://localhost/projects/React%20Crud%20PHP%20MySQL/api/index.php",
      { inputs }
    ); //80 , 443  http://localhost:8888
    console.log(inputs);
  };

  return (
    <div>
      <h1>Create User</h1>
      <form action="" onSubmit={handleSubmit}>
        <table cellSpacing={10}>
          <tbody>
            <tr>
              <th>
                <label htmlFor="">Name: </label>
              </th>
              <td>
                <input type="text" name="name" onChange={handleChange} />
              </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">Email: </label>
              </th>
              <td>
                <input type="text" name="email" onChange={handleChange} />
              </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">Mobile: </label>
              </th>
              <td>
                <input type="text" name="mobile" onChange={handleChange} />
              </td>
            </tr>
            <tr>
              <td colSpan={2} align="right">
                <button>Save</button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  );
}
