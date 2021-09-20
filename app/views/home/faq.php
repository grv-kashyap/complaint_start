<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<div class="container ">
    <div class="panel-group" id="faqAccordion">
        <?php 
          if(count($data['faqArray'])):
            foreach($data['faqArray'] as $faq):
        ?>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?php echo $faq['faq_id']; ?>">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: <?php echo $faq['faq_question']; ?></a>
              </h4>

            </div>
            <div id="question<?php echo $faq['faq_id']; ?>" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p><?php echo $faq['faq_answer']; ?></p>
                </div>
            </div>
        </div>
        <?php 
           endforeach;
           endif;   
        ?>
        
    </div>
    <!--/panel-group-->
</div>