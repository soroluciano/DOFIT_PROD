<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


    <div class="col-md-8">
      <h2 class="page-header">Comments</h2>
        <section class="comment-list">
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
				<img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl;echo "/images/1.jpg"; ?>"/>
                <figcaption class="text-center">Profesor Juancito</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Chicos el sabado 19 habrá actividades normalmente
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> comentar</a></p>
                </div>
              </div>
            </div>
          </article>
          <!-- Second Comment Reply -->
          <article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl;echo "/images/avatar-dhg.png"; ?>" />
                <figcaption class="text-center">Hernan Mancuso</figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <!--<div class="panel-heading right">Reply</div>-->
                <div class="panel-body">
                  <header class="text-left">
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Gracias!
                    </p>
                  </div>
                  <p class="text-right"></p>
                </div>
              </div>
            </div>
          </article>
          <!-- Third Comment -->
        </section>
    </div>
  </div>
