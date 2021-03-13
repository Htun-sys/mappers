<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <title>Fallen Heroes</title>

    <style type="text/css">
    	.card {
    		border-radius: 5px;
    		overflow: hidden;
    	}
      .crud_table {
        line-height: 1.2rem;
        width: 100%;
      }
      a.nav-item {
        margin: auto;
      }
      body {
        background-color: #ebecf0;
      }

    @media (max-width: 576px) {
      .crud_table_wrapper {
        margin: 5%;
      }
      .crud_table {
        line-height: 1rem;
      }

    }

    </style>

  </head>
  <body>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/">နွေဦးသူရဲကောင်းများ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="/">Home</a>
      <a class="nav-item nav-link" href="/chart">Stats</a>
			
		    <!-- <a class="nav-item nav-link" href="/register">Register</a> -->

        @if(Session::get("user")) 
        <a class="nav-item nav-link" href="/crud">Database</a>
        <a class="nav-item nav-link" href="/logout">Logout</a>
        @else
        <a class="nav-item nav-link" href="/login">Login</a>
        @endif
		    </div>
		</div>
	</nav>

	<div class="container">
	@yield("content")
	</div>

  <footer class="bg-dark text-white text-center p-2 mt-1">2021 Myanmar
  </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
      
    </script>
  </body>
</html>