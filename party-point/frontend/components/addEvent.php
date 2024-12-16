<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Event</title>
  <link rel="stylesheet" type="text/css" href="addEvent.css" />

</head>
<body>
  <div class="container">
    <h1>Add Event</h1>

    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="phone">Phone Number:</label>
    <input type="number" id="phone" name="phone" required>

    <label for="party-type">Party Type:</label>
    <select id="party-type" name="party-type">
      <option value="wedding">Wedding</option>
      <option value="birthday">Birthday</option>
      <option value="corporate">Corporate Event</option>
      <option value="anniversary">Anniversary</option>
    </select>

    <label for="location">Party Location/Address:</label>
    <input type="text" id="location" name="location" required>

    <label>Over Services:</label>

    <div class="input-box">
    <input type="checkbox" id="food" />
    <label for="food">Food</label>
 

  <div class="input-box">
    <input type="checkbox" id="music" />
    <label for="music">Music / Dancing</label>
  </div>

  <div class="input-box">
    <input type="checkbox" id="photography" />
    <label for="photography">Photography</label>
  </div>

  <div class="input-box">
    <input type="checkbox" id="dressmaking" />
    <label for="dressmaking">Dressmaking</label>
  </div>
  <div class="form-row">
    <input onmouseover="this.style.backgroundColor='#67099a';"
    onmouseout="this.style.backgroundColor='#AD49E1';" type="submit" id="submit" value="Submit">
  </div>
  </div>
</body>
</html>