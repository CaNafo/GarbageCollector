function Login()
{
	 var user = document.getElementById('User').value;
	 var pass = document.getElementById('Pass').value;

	 if(user=='Admin' && pass=='admin')
	 {
			window.location = "indexAdmin.php";
				

	 }
	 else
	 {

		 alert('Unijeli ste pogrešnu šifru ili username!');

	 }
}
