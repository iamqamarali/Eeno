<?php
    include_once 'partials/header.php';
?>


<div class="main">
    <div class="section bg-light">
        <div class="container ">

            <div class="row text-center justify-content-center">
                <div class="col-md-6">
                    <h2 class="title">A Php FrameWork</h2>
                    <p>
                        This is a php framework made by <b> <?= $user->name ?> </b>
                        to render beautiful sites for making web a more beautiful place.
                        I used the following design patters listed below to accomplished task
                     </p>
                </div>
            </div>
            <br><br><br>
            
            <?php
                $colors =  [
                    'blue' , 'green' , 'yellow' , 'brown' , 'purple' , 'orange'
                ];
                $i = 0;
            ?>
            <div class="row">
                <?php  foreach($designPatterns as $dp ) : ?>
                    <div class="col-md-4">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" 
                                data-background="color" 
                                data-color="<?= $colors[ $i++ % 6 ] ?>" 
                                data-radius="none">

                                <div class="card-body">
                                    <h5 class="card-title"><?= $dp ?></h5>
                                    <p class="card-description"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias vitae officiis adipisci voluptatem assumenda mollitia nostrum sed, nemo ipsa. Tempora deserunt nobis cum. Harum, facere quidem? Voluptatum amet error nihil.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>

        </div><!-- Container -->
    </div><!--  Section -->
</div>






<?php
    include_once 'partials/footer.php'
?>