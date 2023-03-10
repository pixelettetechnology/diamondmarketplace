    
    <?php 
    
    if(count($nfts) > 0){?>
    <h4 class="total_nfts">Total Nfts  <?php echo count($nfts)  ?></h4>  
   <?php foreach ($nfts as $key => $nft) {
        
    ?>
    
    <div class="col-sm-6 col-md-4 col-lg-4 myfvt"> 
        <div class="card nft-items nft-primary rounded-7 border-0 overflow-hidden mb-1 p-4" startdate="<?php echo esc($nft->start_date); ?>" enddate="<?php echo esc($nft->end_date); ?>"> 
            <div class="nft-image rounded-7 position-relative">
                <?php 
                $fileExtension = pathinfo($nft->file, PATHINFO_EXTENSION); 
                if ($fileExtension == 'mp4' || $fileExtension == 'webm') { ?>
                    <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block">
                        <video loop="true" autoplay="autoplay" muted> <source src="<?php echo base_url().'/'.$nft->file; ?>" type="video/mp4"> </video>
                    </a>
               <?php      
                }else if($fileExtension == 'mp3'){  ?>
                    <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block">
                        <audio controls src="<?php echo base_url().'/'.$nft->file; ?>">   </audio>
                    </a>
                <?php 
                }else{
                ?> 
                <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block"><img src="<?php echo base_url().$nft->file; ?>" class="img-fluid" alt=""></a>
            <?php } ?>
                <!-- <div class="nft-time-counter position-absolute rounded-pill title-dark">
                    
                    <i class="uil uil-clock"></i> <small id="auction-item-51"><?php echo esc($nft->auctionDateTime); ?></small>
                    
                </div> -->
            </div>
            <div class="card-body content position-relative mt-3">
                <div class="d-flex justify-content-between mb-2">
                    <div class="img-group">
                        <?php foreach($nft->favorite3img as $key=>$image){  ?>
                        <a href="" class="user-avatar <?php if ($key > 0) echo 'ms-n3';  ?>">
                            <?php  
                            if($image->image){ ?>
                               
                            <?php }else{  ?>
                            <?php } ?>
                        </a>
                        <?php } ?> 
                    </div>
                    <span class="like-btn"> 
                        <button class="like-wrap text-muted d-flex align-items-center fw-semi-bold favorite_item" id="favorite_item" nftId="<?php echo esc($nft->nftId); ?>" favoriteVal="<?php echo esc($nft->favoriteVal); ?>">
                        <img src=<?php echo base_url() .'/'. '/public/uploads/nfts/dnxt.png'   ?> height="100%" width="100%">

                            <span class="like-number_<?php echo esc($nft->nftId); ?> ms-1"><?php echo esc($nft->favoriteVal) ?></span>
                        </button>
                    </span>
                </div>
                <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>"
                    class="d-block fw-semi-bold h6 text-dark text-truncate title"><?php echo esc($nft->name .' #'. $nft->token_id); ?> </a>
                <div class="d-flex justify-content-between mt-2">
                    <small class="rate fw-semi-bold text-primary"><?php echo number_format($nft->min_price, 6, '.', ',').' '.SYMBOL(); ?></small>
                    
                </div>
               
                
            </div>
            <hr class="hr"></hr>
            <ul class="list-group list-group-flush" >
              <li class="list-group-item" style="background:none !important">
                <div class="d-flex justify-content-between">
                  <span class="name">Current Price</span>
                  <span style="color:#505050">Owner</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span class="price">1000 DNXT ($91)</span>
                  <span style="color:#505050"><?php echo esc($collection->title); ?></span>
                </div>
              </li>
            </ul>
        </div>
    </div>
    <?php 

        } 
    }else{ 

    ?>
    <div class="card">
        <div class="align-items-center card-body d-flex ji justify-content-center empty-tag">
            <blockquote class="blockquote mb-0">
              <h4 class="text-center text-primary"><?php echo display('Data_not_found'); ?></h4> 
            </blockquote>
        </div>
    </div>
  

    <?php } ?>
