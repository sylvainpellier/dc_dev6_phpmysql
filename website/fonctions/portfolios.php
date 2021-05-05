<?php

function affichagePortolios($max = false, string $size = "col-md-6 col-lg-4 mb-5")
{
    global $dbh;

    $sql = "SELECT portfolios.id as id, portfolios.name as PortfolioName, categories.name as CategorieName, src FROM portfolios INNER JOIN categories ON categories.id = portfolios.categorie_id ";
    if($max)
    {
        $sql .= " LIMIT 0,:max";
    }

    $stmt = $dbh->prepare($sql);
    if($max){
        $stmt->bindParam("max",$max,PDO::PARAM_INT);
    }
    $stmt->execute();
    $portofolios = $stmt->fetchAll();

    $i=0;
    foreach($portofolios as $portofolio) {

            if($i===0) { $forceSize="col-md-12 col-lg-12 mb-5"; } else { $forceSize = $size; }
            affichagePortfolio($portofolio,$forceSize);
            $i++;
    }
}

function affichagePortfolio($portofolio,$size)
{




    echo '<div class="'.$size.'">
                <div class="portfolio-item mx-auto" data-toggle=\'modal\' data-target="#portfolioModal1"><a href="index.php?page=produit&id='.$portofolio["id"].'">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                    </div>
                    <h4>'.$portofolio["PortfolioName"].' '.$portofolio["CategorieName"].'</h4>
                    <img class="img-fluid" src="'.$portofolio["src"].'" alt="..." />
                </div>
                </a>
            </div>';
}