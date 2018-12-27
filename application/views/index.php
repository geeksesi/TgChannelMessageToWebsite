<?php include 'header.php'; ?>

<div class="content">
    <?php $i = 0 ; ?>
    <?php for (;$i < $rows ; $i++): ?>
    <article class="col four radius">
        <div class="detail row">
            <div class="two col thumb">
                <img style="margin: 12%; border-radius: 4px " src="<?=$thumb[$i]; ?>" alt="" title="" width="70%">
            </div>
            <div class="ten col">
                <p style="margin: 4px"><a href="https://geeksesi.xyz/telegram/post/<?=$title[$i]; ?>" style="font-size: medium ; color: #4b82b7">
<?=$title[$i]; ?>
                    </a></p>
                <p style="font-size: x-small; margin: 0">
                    انتشار یافته در : <?=$time[$i]; ?>
                </p>
            </div>
        </div>
        <div class="row post">
            <p>
<?=$text[$i]; ?>
                <br>
                <?php if ($media_type[$i] == "photo"){ ?>
                    <img src="<?=$media[$i];  ?>" width="90%" height="300px" style="margin: 5%">
                <?php } else{ ?>
                    <br><br>
                <a href="<?=$media[$i]; ?>" >دانلود فایل همراه</a>
                    <br>
                <?php } ?>
            </p>
        </div>
        <div class="row tag" >
           <a href="https://geeksesi.xyz/telegram/tag/<?=$tag1[$i]; ?>"><?=$tag1[$i];?></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href=""><?=$tag2[$i];?></a>
            &nbsp;&nbsp;&nbsp; &nbsp;
            <a href=""><?=$tag3[$i];?></a>
        </div>
    </article>
    <? endfor; ?>
</div>

<br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
