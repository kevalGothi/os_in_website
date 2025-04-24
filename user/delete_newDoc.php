<?php

require_once "../db/conn.php";
$id = $_GET['id'];
?>
<style>
* {
  margin: 0;
  padding: 0;
  border: 0;
  box-sizing: border-box;
  &:before, &:after {
    box-sizing: border-box;
  }
}

html, body {
  min-height: 100%;
  background-color: #00000f;
  font-size: 20px;
  font-family: sans-serif;
}

.box {
  background: linear-gradient(#269b88, #111d20);
  width: 500px;
  border: 2px solid #3db19b;
  padding: 20px 40px;
  text-align: center;
  border-radius: 15px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%, -50%, 0);
  h1 {
    color: #ffeea4;
    font-size: 1.2em;
    text-shadow: 2px 2px 2px rgba(#000, 0.5);
    margin-bottom: 20px;
  }
  p {
    text-shadow: 2px 2px 2px rgba(#000, 0.5);
    background-color: #143c3b;
    box-shadow: inset 0 0 5px rgba(#000, 0.5);
    padding: 20px;
    color: #21a09c;
    margin-bottom: 20px;
  }
  form {
    display: flex;
    justify-content: center;
    button {
      display: block;
      padding: 10px 20px;
      border-width: 1px;
      border-style: solid;
      border-radius: 3px;
      text-decoration: none;
      &:nth-of-type(1) {
        border-color: #24c8e2;
        color: #27cfd1;
        background: linear-gradient(#1988ad, #26234e);
        box-shadow: 0 0 10px #1988ad;
      }
      &:nth-of-type(2) {
        border-color: #c82110;
        color: #cb491b;
        background: linear-gradient(#7a160b, #180017);
        box-shadow: 0 0 10px rgba(#000, 0.5);
      }
      &+button {
        margin-left: 20px;
      }
      &.confirm {
        position: relative;
        overflow: hidden;
        &:before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(#fff, 0.25);
          transform: translateX(-100%);
          transition: none;
        }
        &:hover {
          &:before {
            transition: all 1s linear;
            transform: translateX(0%);
          }
        }
      }
    }
  }
}

</style>
<div class='box'>
  <h1>Are you sure?</h1>
  <p>
    Do you really want to destroy this item? No take-backs!
    <br>
    <br>
    Time to decide. Hurry up.
  </p>
  <div class='buttons'>
      <form method="POST">
          <button type="submit" class='confirm' name="YES">Destroy</button>
          <button type="submit" name="NO">Cancel</button>
      </form>
    <!--<a class='confirm' href='#'>Destroy</a>-->
    <!--<a href='#'>Cancel</a>-->
  </div>
</div>
<!--<a href="javascript:void(0)" onclick="history.back();" title="Return to the previous page">« Go back</a>-->
<?php
    if(isset($_POST['YES'])){
        $DeleteSQL = mysqli_query($conn,"DELETE FROM new_doc WHERE id = '$id'");
        if($DeleteSQL){
            echo "<script>alert('Successfully Delete Data')</script>";
            echo "<script>
        window.location.href = 'demo.php';
        </script>";
        }
    }elseif(isset($_POST['NO'])){
        echo "<script>
        window.location.href = 'demo.php';
        </script>";
    }
?>
