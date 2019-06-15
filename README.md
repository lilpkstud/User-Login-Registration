# User-Login-Registration
Source code where I can quickly copy and paste code so users can register and login into a web application.

# Technologies Used

* PHP, MYSQLi
* Twitter Bootstrap to make website responsive
* PHP dotenv

# What I Learned
<ol>
  <li> How to properly setup MYSQLi connection </li>
  <li>How to hash user's password and unhash to grab the user's record from db </li>
    <ul>
      <li>password_hash($password, PASSWORD_DEFAULT);</li>
      <li>password_verify($password, $row['password'])</li>
    </ul>
</ol>
