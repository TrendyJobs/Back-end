<?php

namespace App\Model\Monster;

use App\Model\JobScrapper;


class MonsterScrapper extends JobScrapper {

    public function __construct()
    {
        $this->editRegex('title', "#<span id=\"lblCriteria\" title=\"(.*)\">#");
        $this->editRegex('url', "");
        // find a way to get it ! get the date when we scrap ?
        $this->editRegex('date', "#EQUIV=\"expires\" CONTENT=\"\\w{3}, ([0-9]{2} \\w{3} [0-9]{4})#");
        $this->editRegex('town', "#&geo=(.+?)%#");
        $this->editRegex('skills', "");
        $this->editRegex('training', "#educationRequirements\">(.*)</span>#");
        $this->editRegex('type', "#itemprop=\"employmentType\">(.*?)</span></dd><dd#");
        $this->editRegex('text', "#NAME='TrackingJobBody'>(.*)[\r\n\t ]*?<img#");
        $this->editRegex('company', "#temprop=\"name\">(.*)(</span>|</p>)#");
        $this->editRegex('crawler', "");
        $this->editRegex('wage', "#itemprop=\"baseSalary\">(.+?)</span>#");
        $this->editRegex('id', "");
        $this->editRegex('experience', "#experienceRequirements\">(.*)</span>#");
    }

}
