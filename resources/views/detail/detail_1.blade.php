<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Survive The Drive</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container my-5">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="{{ asset('assets/images/foto/eating.jpg') }}" class="img-fluid" alt="Survive The Drive"style="width: 100%;">
      </div>
      <div class="col-md-6">
        <h1 class="display-4">Survive The Drive</h1>
        <p class="lead">A Guide to Keeping Everyone on the Road Alive</p>
        <p>By Tom Dingus with Mindy Buchanan-King</p>
        <p><strong>Category:</strong> Health And Fitness</p>
        <p><strong>Rating:</strong> 5 out of 5 stars</p>
        <div class="btn-group" role="group" aria-label="Read Online">
          <a href="{{ asset('uploads/a-conversation-about-healthy-eating.pdf ') }}" class="btn btn-primary">Read Online</a>
          <a href="{{ route('dashboard_user') }}" class="btn btn-outline-primary">Cancel</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-1X2Drqw8nh04YJ8rYL/LGYxhZ/2ldiSf4Fzkv11lBILJgXr9rGMpvZE7kcDhZjng" crossorigin="anonymous"></script>
</body>
</html>
