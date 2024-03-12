<?php

declare(strict_types=1);

//need to manage htaccess to access images for profile

class CardView
{
    public static function getCardViews(array $params)
    {
        $data = $params['data'];

        $count = count($data);

        ?>


        <div class="search-bar">
            <div class="row">
                <div class="col-10">
                    <input class="form-control" type="text" id="searchInput" placeholder="Search...">
                </div>
                <div class="col-2">
                    <button onclick="search() " class="btn btn-primary ">Search</button>
                </div>
            </div>

        </div>


        <div class="row px-3 py-3">

            <?php
            foreach ($data as $row) {
                ?>
                <div class="col-4  mb-3">

                    <div class="card" style="width: 18rem;">
                        <!--            <img class="card-img-top" src="profile.jpg" alt="Card image cap">-->
                        <div><i class="fa-regular fa-user"></i></div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['studentName'] ?></h5>
                            <p class="card-text">
                            <ul>
                                <li><?= $row['studentId'] ?></li>
                                <li><?= $row['studentEmail'] ?></li>
                            </ul>
                            </p>
                            <a href="#" class="btn btn-primary">Enroll</a>
                        </div>
                    </div>
                </div>


                <?php
            }
            ?>
        </div>

        <?php
    }

}

?>


