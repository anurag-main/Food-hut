<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  name="feedback" method="POST" onsubmit="return validateResponse()">

<h1>Feedback Form</h1>

  <label for="name">Name :</label>
  <input type="text" id="name" name="name" required /><br />

  <label for="email">Email :</label>
  <input type="email" id="email" name="email" required /><br />

  <label for="phone">Phone Number :</label>
  <input type="tel" id="phone" name="phone" required /><br />

  <label for="feedback">Feedback :</label>
  <textarea
    id="msg"
    name="msg"
    rows="4"
    required></textarea><br /> 

  <input type="submit" value="Submit" />
  <input type="reset" ></input>
</form>

<script>
    function validatenResponse() {
        alert("Done!!")
        var validRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/;
        if (document.feedback.name.value == "" || document.feedback.name.value == null) {

            alert("Name can't be blank");
            document.feedback.name1.focus();
            return false;

        }
        else if(!document.feedback.email.value.match(validRegex))
        {
            alert("Enter Proper Email");
            document.feedback.email.focus();
            return false;
        }
        else if(document.feedback.phone.value == "" || document.feedback.phone.value == null)
        {
            alert("Feedback can't be blank");
            document.feedback.info.focus();
            return false;
        }
        else if(document.feedback.msg.value =="" || document.feedback.rating.value == null)
        {
            alert("Give Rating");
            document.feedback.rating.focus();
            return false;
        }
       
        console.log("Check");
        
        alert("Your Response has been recorded. Thankyou for feedback.");


    }
</script>

</body>
</html>