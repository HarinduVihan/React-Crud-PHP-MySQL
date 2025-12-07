import { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate, useParams } from "react-router-dom";

export default function EditUser() {
  const navigate = useNavigate();

  const { id } = useParams();

  const [inputs, setInputs] = useState({});

  useEffect(() => {
    getUser();
  }, []);

  function getUser() {
    axios
      .get(
        `http://localhost/projects/React%20Crud%20PHP%20MySQL/api/index.php/${id}`
      )
      .then(function (response) {
        console.log(response.data);
        setInputs(response.data);
      });
  }

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((prevValues) => ({ ...prevValues, [name]: value }));
  };

  const handleSubmit = (event) => {
    event.preventDefault();

    axios
      .put(
        `http://localhost/projects/React%20Crud%20PHP%20MySQL/api/index.php/${id}`,
        { inputs }
      )
      .then(function (response) {
        console.log(inputs);
        console.log(response.data);
        navigate("/");
      });
  };

  return (
    <div>
      <h1>Edit User</h1>
      <form action="" onSubmit={handleSubmit}>
        <table cellSpacing={10}>
          <tbody>
            <tr>
              <th>
                <label htmlFor="">Name: </label>
              </th>
              <td>
                <input
                  type="text"
                  value={inputs.name}
                  name="name"
                  onChange={handleChange}
                />
              </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">Email: </label>
              </th>
              <td>
                <input
                  type="text"
                  name="email"
                  value={inputs.email}
                  onChange={handleChange}
                />
              </td>
            </tr>
            <tr>
              <th>
                <label htmlFor="">Mobile: </label>
              </th>
              <td>
                <input
                  type="text"
                  name="mobile"
                  value={inputs.mobile}
                  onChange={handleChange}
                />
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
