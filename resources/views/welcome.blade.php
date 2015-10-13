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
        margin-bottom: 8px;
      }
      .customer-rating {
        margin-bottom: 8px;
      }
      .customer-name {
        font-weight: bold;
        text-decoration: none;
      }
      .business-info {
        font-size: 24px;
      }
      .business-phone {
        font-size: 24px;
        text-align: right;
      }
      .business-rating {
        font-size: 16px;
        text-align: right;
        margin-top: 20px;
      }
      .business-header {
        margin-bottom: 20px;
        background: #EEEEEE;
        border-bottom: 1px solid grey;
        margin-top: 0px;
      }
      .business-name {
        display: inline-block;
        margin-right: 20px;
      }
      .offsite-link {
        position: relative;
        top: -12px;
      }
      body { 
        padding-bottom: 80px; 
      }
    </style>
    </head>
    <body>
       <div class="page-header business-header">
       <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1 class="business-name" data-bind="text: business_name"></h1>
              <a data-bind="attr: { href: $root.external_page_url }" target="_blank"><img src="/img/link.png" class="offsite-link" /></a>
            </div>
            <div class="col-md-6 business-rating">
              <div>Avg Rating: <b><span data-bind="text: rating"></span>&nbsp;/&nbsp;5</b></div>
              <div>Total Reviews: <span data-bind="text: no_reviews"></span>
</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 business-info" data-bind="html: business_address"></div>
            <div class="col-md-6 business-phone" data-bind="html: business_phone"></div> 
          </div>
       </div>
       </div>
       <div class="container">
       <div data-bind="foreach: reviews">
           <div class="row">
                <div class="col-md-10 customer-name">
                <img data-bind="attr: { src: $root.source_images[review_from] }" />
                <a data-bind="attr: { href: customer_url }, text: customer_name"></a>
                (<span data-bind="text: date_of_submission"></span>)
                </div>
                <div class="col-md-2 customer-rating">
                  <div data-bind="foreach: new Array(parseInt(rating))">
                    <img width="22" height="21" src="/img/star.png"/>
                  </div>
                </div>
           </div>
           <div class="row customer-description">
                <div class="col-md-12" data-bind="html: description"></div>
           </div>
       </div>
       <nav class="navbar navbar-default navbar-fixed-bottom">
       <div class="container">
       <ul class="pagination" data-bind="foreach: pages">
           <li data-bind="css: {active: $data == $root.page}"><a href="#" data-bind="text: $data+1, click: function (data) { getPage($data) }"></a></li>
       </ul>
       </div>
       </nav>
       </div>
       <!-- scripts go at bottom of page -->
       <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
       <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"></script>
       <script src="/js/bootstrap.min.js"></script>
       <script src="/js/reploop.js"></script>
    </body>
</html>
