<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">">
  </head>
  <body>
    <div id="feedback" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title text-xs-center">Sign Up</h4>
          </div>
          <div class="modal-body">
            <!-- registration form -->
            <form>
              <h5 class="m-b-2">Basic Info</h5>
              <fieldset class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name">
              </fieldset>
              <fieldset class="form-group has-danger">
                <label for="mail" class="form-control-label p-l-0">Email:</label>
                <input type="email" class="form-control form-control-danger" id="mail">
              </fieldset>
              <fieldset class="form-group has-danger">
                <label for="mail" class="form-control-label p-l-0">Password:</label>
                <input type="email" class="form-control form-control-danger" id="mail">
              </fieldset>
              <fieldset class="form-group has-danger">
               <label for="number" class="form-control-label p-l-0">Feedback:</label>
               <textarea rows="4" cols="50">
               </textarea>
             </fieldset>
              <hr class="m-b-2">
              <button type="submit" class="btn btn-primary btn-lg center-block">Register</button>

            </form><!-- /registration form -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
