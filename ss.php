<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f4f4f4;
}

* {
  box-sizing: border-box;
}

/* Style the container */
.container {
  background-color: #fff;
  margin: 50px auto;
  padding: 20px;
  border-radius: 5px;
  width: 80%;
}

h2 {
  text-align: center;
  margin-top: 0;
  color: #333;
}

input[type=text], input[type=password], input[type=date], input[type=email], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 4px;
}

input[type=checkbox] {
  margin: 8px 0;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 4px;
}

button:hover {
  opacity: 0.9;
}

/* Style the labels */
label {
  display: block;
  color: #333;
  margin-bottom: 5px;
}

/* Style the form */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group {
  width: 100%;
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.form-group label {
  margin-bottom: 5px;
}

.form-group input, .form-group select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group textarea {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  min-height: 100px;
}

.form-group .error {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}

.form-group .checkbox-group {
  display: flex;
  align-items: center;
}

.form-group .checkbox-group label {
  margin-left: 5px;
}

.form-group .radio-group {
  display: flex;
  align-items: center;
  margin-top: 5px;
}

.form-group .radio-group input {
  margin-right: 5px;
}

.form-group .radio-group label {
  margin-left: 5px;
}

.form-group .select-group {
  display: flex;
  align-items: center;
}

.form-group .select-group select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style the button */
.form-group button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

.form-group button:hover {
  opacity: 0.9;
}

/* Style the error message */
.error {
  color: red;
  font-size: 12px;
}

/* Responsive design */
@media screen and (max-width: 600px) {
  .container {
    width: 95%;
  }

  .form-group {
    flex-direction: column;
  }
}
</style>
</head>
<body>

<div class="container">
  <h2>Personal Information</h2>
  <form>
    <div class="form-group">
      <label for="fname">First name:</label>
      <input type="text" id="fname" name="fname" placeholder="First name">
    </div>
    <div class="form-group">
      <label for="mname">Middle name:</label>
      <input type="text" id="mname" name="mname" placeholder="Middle name">
    </div>
    <div class="form-group">
      <label for="lname">Last name:</label>
      <input type="text" id="lname" name="lname" placeholder="Last name">
    </div>
    <div class="form-group">
      <label for="extname">Extension name:</label>
      <input type="text" id="extname" name="extname" placeholder="Extension name">
    </div>
    <div class="form-group">
      <label for="nickname">Nickname:</label>
      <input type="text" id="nickname" name="nickname" placeholder="Nickname">
    </div>
    <div class="form-group">
      <label for="lrn">LRN:</label>
      <input type="text" id="lrn" name="lrn" placeholder="LRN">
    </div>
    <div class="form-group">
      <label for="birthdate">Birthdate:</label>
      <input type="date" id="birthdate" name="birthdate" placeholder="dd/mm/yyyy">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="religion">Religion:</label>
      <select id="religion" name="religion">
        <option value="christianity">Christianity</option>
        <option value="islam">Islam</option>
        <option value="buddhism">Buddhism</option>
        <option value="hinduism">Hinduism</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="place_of_birth">Place of Birth:</label>
      <input type="text" id="place_of_birth" name="place_of_birth" placeholder="Place Of Birth">
    </div>
    <div class="form-group">
      <label for="medical_history">Medical History:</label>
      <textarea id="medical_history" name="medical_history" placeholder="Medical History"></textarea>
    </div>
    <div class="form-group">
      <label for="reason">Reason:</label>
      <textarea id="reason" name="reason" placeholder="Reason"></textarea>
    </div>
    <button type="submit">Continue</button>
  </form>
</div>

</body>
</html>