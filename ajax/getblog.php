<?php 
include('connection.php');
if(password_verify("data", $_POST['token'])){
    $query = $db->prepare('SELECT * FROM blogdata order by bid desc LIMIT 3');
    $data = array();
    $execute=$query->execute($data);
    $datarow=$query->fetch();
    ?>
    <div class="col-sm-6">
        <div class="grid">
            <figure class=" blog-main effect-zoe">
                <div class="imgblur" id="main-img">
                    <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><img src="social/<?php echo $datarow['ImagePath']; ?>" alt="img25"/></a>
                </div>
                <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><figcaption>
                    <h2><?php
                        if(strlen($datarow['Title']) > 60)
                            echo substr($datarow['Title'],0, 55). "...";
                        else
                            echo $datarow['Title'];
                    ?></h2>
                    <h5 class="icon-links"><span ><i class="fa C"></i></span> <?php echo $datarow['Author']; ?> . <?php echo $datarow['Date']; ?></h5>
                </figcaption></a>
            </figure>
        </div>
</div>
        <div class="col-sm-6 paddoff">
    <?php
    //2nd Part
    $datarow=$query->fetch();
    ?>

        <div class="grid">
            <figure class=" blog-top effect-zoe">
            <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><img src="social/<?php echo $datarow['ImagePath']; ?>" alt="img25"/></a>
            <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><figcaption>
                    <h2><?php
                        if(strlen($datarow['Title']) > 60)
                            echo substr($datarow['Title'],0, 55). "...";
                        else
                            echo $datarow['Title'];
                    ?></h2>
                    <h5 class="icon-links"><span ><i class="fa fa-user-circle"></i></span> <?php echo $datarow['Author']; ?> . <?php echo $datarow['Date']; ?></h5>
                </figcaption></a>
            </figure>
        </div>
    <?php
    //3rd Part
    $datarow=$query->fetch();
    ?>
        <div class="grid">
            <figure class=" blog-btm effect-zoe">
            <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><img src="social/<?php echo $datarow['ImagePath']; ?>" alt="img25"/></a>
            <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>"><figcaption>
                    <h2><?php
                        if(strlen($datarow['Title']) > 60)
                            echo substr($datarow['Title'],0, 55). "...";
                        else
                            echo $datarow['Title'];
                    ?></h2>
                    <h5 class="icon-links"><span ><i class="fa fa-user-circle"></i></span> <?php echo $datarow['Author']; ?> . <?php echo $datarow['Date']; ?></h5>
                </figcaption></a>
            </figure>
        </div>
    </div>
        
 <?php
}
if(password_verify("lowerdata",$_POST['token']))
{
    $query = $db->prepare('SELECT * FROM blogdata');
    $data = array();
    $execute=$query->execute($data);
?>
    <div  style="width:100%;" class="content-2">
        <div class="col-sm-3">
            <div class="create">
                <i class="fa fa-plus-circle" style="font-size:48px"></i>
                <a href="createPost.php">Create Post</a>
            </div>
        </div>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
        <div class="col-sm-3">
            <div class="box">
                <div>
                    <img src="social/<?php echo $datarow['ImagePath']; ?>" alt="Reload" style="width:100%;">
                </div>
                <div style =" ">
                
                    <p><?php if(strlen($datarow['Title']) > 80)
                            echo substr($datarow['Title'],0, 75). "...";
                        else
                            echo $datarow['Title']; ?></p>
                    <a href="viewBlog.php?bid=<?php echo $datarow['bid']; ?>" class="btn">View More</a>
                </div>
            </div>
        </div>

    <?php
        }
    ?>
    </div>
<?php
}
