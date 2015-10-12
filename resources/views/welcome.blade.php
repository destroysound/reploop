<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reputation Loop API Consumer</title>
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
       <h1 data-bind="text: business_info.business_name"></h1>
       <div class="container">
          <div class="row">
            <div class="col-md-6" data-bind="html: business_info.business_address"></div>
            <div class="col-md-6" data-bind="html: business_info.business_phone"></div> 
          </div>
       </div>
       <div class="container">
       <div data-bind="foreach: reviews">
           <div class="row">
                <div class="col-md-4">Customer Name:</div>
                <div class="col-md-4" data-bind="text: customer_name"></div>
           </div>
           <div class="row">
                <div class="col-md-4">Date of Submission:</div>
                <div class="col-md-4" data-bind="text: date_of_submission"></div>
           </div>
           <div class="row">
                <div class="col-md-12" data-bind="html: description"></div>
           </div>
       </div>
       <nav>
       <ul class="pagination" data-bind="foreach: pages">
           <li data-bind="text: $data+1, click: function (data) { getPage($data) }"></li>
       </ul>
       </nav>
       </div>
       <!-- scripts go at bottom of page -->
       <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
       <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"></script>
       <script src="/js/bootstrap.min.js"></script>
       <script src="/js/reploop.js"></script>
    </body>
</html>
