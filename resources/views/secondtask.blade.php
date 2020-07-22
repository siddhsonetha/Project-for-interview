<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            background-color:lavender;
        }
    </style>
<script type="text/javascript">

    function err() {
        var xc = document.getElementById('num').value;
        var c=0;
        if (isNan(xc)){

        }
        else
        {
            if(xc<=0 && xc>27)
            {

            }
        }

    }
    function getherer() {
        var xc = document.getElementById('num').value;
        var i, j;


        for(i=1;i<=xc;i++)
        {
            for(j=65;j<65+i;j++)
            {
                var str =String.fromCharCode(j);

                document.write(str);

            }
            document.write('<br>');
        }


    }
</script>
</head>
<body>
Enter Your Number :
<input type="text" class="form-control" id="num" onblur="err()">
<div id="er"></div>
<br>
<button type="submit" class="btn btn-primary" onclick="getherer()">Click Here</button>
<div id="print">

</div>
</body>
</html>
