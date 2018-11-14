<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {


        $('#getdata').on('click',function(e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'http://xxxxxxxxx/api/helloworld',
            headers: {
                Authorization:$('#key').val()
            },
            success: function (data) {     
                $('#finalValue').text($('#finalValue').text()+' "'+data.description+'"')
                $('#finalValue').css("display","block")
            }
          });
        })

		
$(document).ajaxStart(function() {
  $("#wait").css('display','block');
}).ajaxStop(function() {
  $("#wait").css('display','none');
});




        $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: 'http://xxxxxxxxx/api/login',
            data: $('form').serialize(),
	    ajaxStart:function(){
                  $("#wait").css("display", "block");
            },
            success: function (data) {
                var token =  data.success.token
                if(token)
                {
                    $('.helloworld').prop('disabled',false);
                    $('.helloworld').val('Bearer '+token);
//                    $('#finalValue').text('Token Generated Successfully');
//                    $('#finalValue').css("display","block");
                }
                else
                {
                    alert('oops token not generated');
                }
            }
          });
 
        });

      });
    </script>
    <style>
		form {
			max-width: 300px;
			font-size:16px;
		}
		label {
			margin-bottom:5px;
			display:block;
		}
		form input,form button {
			margin-bottom: 15px;
		}
		.input-field {
			display: block;
			width: 100%;
			padding: 5px 10px;
			font-size: 16px;
			line-height: 1.5;
			color: #495057;
			background-color: #fff;
			border: 1px solid #ced4da;
			border-radius: 4px;
		}
		.button {
			border: 1px solid transparent;
			padding: 5px 12px;
			font-size: 16px;
			line-height: 1.5;
			border-radius: 4px;
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
			cursor: pointer;
		}
		
		.button[disabled='true'] {
			opacity: .65;
			cursor:auto;
		}
		.input-field[disabled='true'] {
			background-color: #e9ecef;
			opacity: 1;
		}
    </style>
  </head>
  <body>
	<h1> Using a Widget and authenticating from laravel</h1>
    <form>
      <input type='hidden' class="input-field" name="email" value="xxx@xxx.xx">
      <input type='hidden' class="input-field" name="password" value="xxx123">
      <input name="submit"  class="button" type="submit" value="Get Oauth Token">
      <label>Token</label> <input disabled="true" type="text"   id="key" class='helloworld input-field' value=''/>
      <button disabled="true"  id='getdata' class='helloworld button' >Get Data From Laravel api</button>
      <div style="display:none" id='finalValue' >Data From Laravel is this </div>
    </form>
	<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='loading.gif' width="64" height="64" /><br></div>
  </body>
</html>
