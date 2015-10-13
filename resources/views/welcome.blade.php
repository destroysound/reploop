<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reputation Loop API Consumer</title>
    <!-- Bootstrap -->
    <link href="/css/app.css" rel="stylesheet">
    <style>
      .customer-description {
        margin-bottom: 5px;
      }
      .customer-name {
        font-weight: bold;
        text-decoration: none;
      }
      .business-info {
        font-size: 24px;
        margin-bottom: 20px;
      }
      .business-phone {
        font-size: 24px;
        text-align: right;
      }
    </style>
    </head>
    <body>
       <div class="container">
       <h1 data-bind="text: business_name"></h1>
          <div class="row">
            <div class="col-md-6 business-info" data-bind="html: business_address"></div>
            <div class="col-md-6 business-phone" data-bind="html: business_phone"></div> 
          </div>
       </div>
       <hr />
       <div class="container">
       <div data-bind="foreach: reviews">
           <div class="row">
                <div class="col-md-10 customer-name">
                <a data-bind="attr: { href: customer_url}, text: customer_name"></a>
                (<span data-bind="text: date_of_submission"></span>)
                </div>
                <div class="col-md-2">
                  <div data-bind="foreach: new Array(parseInt(rating))">
                    <img width="22" height="21" src="/img/star.png"/>
                  </div>
                </div>
           </div>
           <div class="row customer-description">
                <div class="col-md-12" data-bind="html: description"></div>
           </div>
       </div>
       <nav>
       <ul class="pagination" data-bind="foreach: pages">
           <li data-bind="css: {active: $data == $root.page}"><a href="#" data-bind="text: $data+1, click: function (data) { getPage($data) }"></a></li>
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
