<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg, #2980b9, #8e44ad);
      height: 100vh;
      overflow: hidden;
    }
    .bg {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      z-index: -999;
    }

    .bg img {
      min-height: 100%;
      width: 100%;
    }
    .logo img {
      min-height: 100%;
      width: 100%;

    }
    .center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      /* background: white; */
      border-radius: 10px;
      /* box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05); */
    }

    .center h1 {
      text-align: center;
      padding: 20px 0;
      border-bottom: 1px solid silver;
    }

    .center form {
      padding: 0 40px;
      box-sizing: border-box;
    }

    form .txt_field {
      position: relative;
      border-bottom: 2px solid #adadad;
      margin: 30px 0;
    }

    .txt_field input {
      width: 100%;
      padding: 0 5px;
      height: 80px;
      font-size: 40px;
      border: none;
      background: none;
      outline: none;
    }

    .txt_field label {
      position: absolute;
      top: 50%;
      left: 5px;
      color: #adadad;
      transform: translateY(-50%);
      font-size: 32px;
      pointer-events: none;
      transition: .5s;
    }

    .txt_field span::before {
      content: '';
      position: absolute;
      top: 80px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #2691d9;
      transition: .5s;
    }

    .txt_field input:focus~label,
    .txt_field input:valid~label {
      top: -5px;
      color: #D2E9FF;
    }

    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
      width: 100%;
    }

    .pass {
      margin: -5px 0 20px 5px;
      color: #a6a6a6;
      cursor: pointer;
    }

    .pass:hover {
      text-decoration: underline;
    }

    input[type="submit"] {
      width: 100%;
      height: 150px;
      border: 1px solid;
      background: #2691d9;
      border-radius: 25px;
      font-size: 60px;
      color: #e9f4fb;
      font-weight: 700;
      cursor: pointer;
      outline: none;
    }

    input[type="submit"]:hover {
      border-color: #2691d9;
      transition: .5s;
    }

    .signup_link {
      margin: 30px 0;
      text-align: center;
      font-size: 32px;
      color: #666666;
    }

    .signup_link a {
      color: #2691d9;
      text-decoration: none;
    }

    .signup_link a:hover {
      text-decoration: underline;
    }
    .hot {
      text-align: center;
      font-weight: 1000;
      color: white;
      font-size: 26px;
    }
  </style>
</head>

<body>
<div class="bg">
    <img src="image/m_globe.jpg">
  </div>
  <div class="center">
  <div class="logo">
        <img src="image/ystravel.png" >
        </div>
        <div class="hot">
        密碼每週一公布於公司LINE群組筆記本!
        </div>


    <form action="m_check.php" method="post">
      <div class="txt_field">
        <input type="text" name="name" value="ystravel" required>
        <span></span>
        <label>帳號</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>密碼</label>
      </div>
      <input type="submit" value="登入">

    </form>
  </div>


</body>

</html>