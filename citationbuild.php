<?php
	//Include the functions file
	include ('includes/functions.php');
	
	$style = filter_input(INPUT_POST,'styleholder');
	$source = filter_input(INPUT_POST,'sourceholder');
	$medium = filter_input(INPUT_POST,'mediumholder');
	
	//Creates a citation
	citationcontainstart($style);
		switch ($source) {
				case "book":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						}
					}
					$publicationyearinput = filter_input(INPUT_POST,'publicationyearinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$booktitleinput = filter_input(INPUT_POST,'booktitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$publisherlocationinput = filter_input(INPUT_POST,'publisherlocationinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$publisherinput = filter_input(INPUT_POST,'publisherinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					if ($medium=="website") {
						$websitetitleinput = filter_input(INPUT_POST,'websitetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doiwebsiteinput = filter_input(INPUT_POST,'doiwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $doidbinput = NULL;
                                                }
                                                if (!isset($yearpublishedinput)) {
                                                    $yearpublishedinput = NULL;
                                                }
                                                if (!isset($mediuminput)) {
                                                    $mediuminput = NULL;
                                                }
                                                if (!isset($urlebookinput)) {
                                                    $urlebookinput = NULL;
                                                }
                                                if (!isset($doiebookinput)) {
                                                    $doiebookinput = NULL;
                                                }
					}
					if ($medium=="db") {
						$databaseinput = filter_input(INPUT_POST,'databaseinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateday = filter_input(INPUT_POST,'dbaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdatemonth = filter_input(INPUT_POST,'dbaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateyear = filter_input(INPUT_POST,'dbaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urldbinput = filter_input(INPUT_POST,'urldbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doidbinput = filter_input(INPUT_POST,'doidbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($doiwebsiteinput)) {
                                                    $doiwebsiteinput = NULL;
                                                }
                                                if (!isset($yearpublishedinput)) {
                                                    $yearpublishedinput = NULL;
                                                }
                                                if (!isset($mediuminput)) {
                                                    $mediuminput = NULL;
                                                }
                                                if (!isset($urlebookinput)) {
                                                    $urlebookinput = NULL;
                                                }
                                                if (!isset($doiebookinput)) {
                                                    $doiebookinput = NULL;
                                                }
					}
					if ($medium=="ebook") {
						$yearpublishedinput = filter_input(INPUT_POST,'yearpublishedinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$mediuminput = filter_input(INPUT_POST,'mediuminput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urlebookinput = filter_input(INPUT_POST,'urlebookinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doiebookinput = filter_input(INPUT_POST,'doiebookinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($doiwebsiteinput)) {
                                                    $doiwebsiteinput = NULL;
                                                }
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $doidbinput = NULL;
                                                }
                                                    
					}
					
					//Execute the citation
					if ($style=="apa6") {
						apa6bookcite($style, $medium, $contributors, $publicationyearinput, $booktitleinput, $publisherlocationinput, $publisherinput, $websitetitleinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $doiwebsiteinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput, $yearpublishedinput, $mediuminput, $urlebookinput, $doiebookinput);
					}
					if ($style=="mla7") {
						mla7bookcite($style, $medium, $contributors, $publicationyearinput, $booktitleinput, $publisherlocationinput, $publisherinput, $websitetitleinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $doiwebsiteinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput, $yearpublishedinput, $mediuminput, $urlebookinput, $doiebookinput);
					}
				break;
					
				case "bookchapter":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						}
					}
					$publicationyearinput = filter_input(INPUT_POST,'publicationyearinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$chapteressayinput = filter_input(INPUT_POST,'chapteressayinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$booktitleinput = filter_input(INPUT_POST,'booktitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesstartinput = filter_input(INPUT_POST,'pagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesendinput = filter_input(INPUT_POST,'pagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesnonconsecutiveinput = filter_input(INPUT_POST,'pagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
					if ($pagesnonconsecutiveinput) {
						$pagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'pagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					}
					$publisherlocationinput = filter_input(INPUT_POST,'publisherlocationinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$publisherinput = filter_input(INPUT_POST,'publisherinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					if ($medium=="website") {
						$websitetitleinput = filter_input(INPUT_POST,'websitetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doiwebsiteinput = filter_input(INPUT_POST,'doiwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $doidbinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
					}
					if ($medium=="db") {
						$databaseinput = filter_input(INPUT_POST,'databaseinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateday = filter_input(INPUT_POST,'dbaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdatemonth = filter_input(INPUT_POST,'dbaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateyear = filter_input(INPUT_POST,'dbaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urldbinput = filter_input(INPUT_POST,'urldbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                $doidbinput = filter_input(INPUT_POST,'doidbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($doidbinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $doiwebsiteinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
					}
					
					//Execute the citation
					if ($style=="apa6") {
						apa6chapteressaycite($style, $medium, $contributors, $publicationyearinput, $chapteressayinput, $booktitleinput, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $publisherlocationinput, $publisherinput, $websitetitleinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $doiwebsiteinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput);
					}
					if ($style=="mla7") {
						mla7chapteressaycite($style, $medium, $contributors, $publicationyearinput, $chapteressayinput, $booktitleinput, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $publisherlocationinput, $publisherinput, $websitetitleinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $doiwebsiteinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput);
					}
				break;
					
				case "magazine":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						}
					}
					$articletitleinput = filter_input(INPUT_POST,'articletitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$magazinetitleinput = filter_input(INPUT_POST,'magazinetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$datepublishedday = filter_input(INPUT_POST,'datepublishedday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$datepublishedmonth = filter_input(INPUT_POST,'datepublishedmonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$datepublishedyear = filter_input(INPUT_POST,'datepublishedyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					if ($medium=="print") {
						$pagesstartinput = filter_input(INPUT_POST,'pagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$pagesendinput = filter_input(INPUT_POST,'pagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$pagesnonconsecutiveinput = filter_input(INPUT_POST,'pagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
						if ($pagesnonconsecutiveinput) {
							$pagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'pagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						}
						$printadvancedinfovolume = filter_input(INPUT_POST,'printadvancedinfovolume',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$printadvancedinfoissue = filter_input(INPUT_POST,'printadvancedinfoissue',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($websiteadvancedinfovolume)) {
                                                    $websiteadvancedinfovolume = NULL;
                                                }
                                                if (!isset($websiteadvancedinfoissue)) {
                                                    $websiteadvancedinfoissue = NULL;
                                                }
                                                if (!isset($webpagesstartinput)) {
                                                    $webpagesstartinput = NULL;
                                                }
                                                if (!isset($webpagesendinput)) {
                                                    $webpagesendinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutiveinput)) {
                                                    $webpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutivepagenumsinput)) {
                                                    $webpagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($dbpagesstartinput)) {
                                                    $dbpagesstartinput = NULL;
                                                }
                                                if (!isset($dbpagesendinput)) {
                                                    $dbpagesendinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutiveinput)) {
                                                    $dbpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutivepagenumsinput)) {
                                                    $dbpagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($dbadvancedinfovolume)) {
                                                    $dbadvancedinfovolume = NULL;
                                                }
                                                if (!isset($dbadvancedinfoissue)) {
                                                    $dbadvancedinfoissue = NULL;
                                                }
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
					}
					if ($medium=="website") {
						$websitetitleinput = filter_input(INPUT_POST,'websitetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$websiteadvancedinfovolume = filter_input(INPUT_POST,'websiteadvancedinfovolume',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$websiteadvancedinfoissue = filter_input(INPUT_POST,'websiteadvancedinfoissue',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webpagesstartinput = filter_input(INPUT_POST,'webpagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webpagesendinput = filter_input(INPUT_POST,'webpagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webpagesnonconsecutiveinput = filter_input(INPUT_POST,'webpagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
						if ($webpagesnonconsecutiveinput) {
							$webpagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'webpagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						}
						$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($pagesstartinput)) {
                                                    $pagesstartinput = NULL;
                                                }
                                                if (!isset($pagesendinput)) {
                                                    $pagesendinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($printadvancedinfovolume)) {
                                                    $printadvancedinfovolume = NULL;
                                                }
                                                if (!isset($printadvancedinfoissue)) {
                                                    $printadvancedinfoissue = NULL;
                                                }
                                                if (!isset($dbpagesstartinput)) {
                                                    $dbpagesstartinput = NULL;
                                                }
                                                if (!isset($dbpagesendinput)) {
                                                    $dbpagesendinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutiveinput)) {
                                                    $dbpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutivepagenumsinput)) {
                                                    $dbpagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($dbadvancedinfovolume)) {
                                                    $dbadvancedinfovolume = NULL;
                                                }
                                                if (!isset($dbadvancedinfoissue)) {
                                                    $dbadvancedinfoissue = NULL;
                                                }
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutiveinput)) {
                                                    $webpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutivepagenumsinput)) {
                                                    $webpagesnonconsecutivepagenumsinput = NULL;
                                                }
					}
					if ($medium=="db") {
						$dbpagesstartinput = filter_input(INPUT_POST,'dbpagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbpagesendinput = filter_input(INPUT_POST,'dbpagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbpagesnonconsecutiveinput = filter_input(INPUT_POST,'dbpagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
						if ($dbpagesnonconsecutiveinput) {
							$dbpagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'dbpagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						}
						$dbadvancedinfovolume = filter_input(INPUT_POST,'dbadvancedinfovolume',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbadvancedinfoissue = filter_input(INPUT_POST,'dbadvancedinfoissue',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$databaseinput = filter_input(INPUT_POST,'databaseinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateday = filter_input(INPUT_POST,'dbaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdatemonth = filter_input(INPUT_POST,'dbaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateyear = filter_input(INPUT_POST,'dbaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urldbinput = filter_input(INPUT_POST,'urldbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($pagesstartinput)) {
                                                    $pagesstartinput = NULL;
                                                }
                                                if (!isset($pagesendinput)) {
                                                    $pagesendinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($printadvancedinfovolume)) {
                                                    $printadvancedinfovolume = NULL;
                                                }
                                                if (!isset($printadvancedinfoissue)) {
                                                    $printadvancedinfoissue = NULL;
                                                }
                                                if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($websiteadvancedinfovolume)) {
                                                    $websiteadvancedinfovolume = NULL;
                                                }
                                                if (!isset($websiteadvancedinfoissue)) {
                                                    $websiteadvancedinfoissue = NULL;
                                                }
                                                if (!isset($webpagesstartinput)) {
                                                    $webpagesstartinput = NULL;
                                                }
                                                if (!isset($webpagesendinput)) {
                                                    $webpagesendinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutiveinput)) {
                                                    $webpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($webpagesnonconsecutivepagenumsinput)) {
                                                    $webpagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
					}
					
					//Execute the citation
					if ($style=="apa6") {
						apa6magazinecite($style, $medium, $contributors, $articletitleinput, $magazinetitleinput, $datepublishedday, $datepublishedmonth, $datepublishedyear, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $printadvancedinfovolume, $printadvancedinfoissue, $websitetitleinput, $webpagesstartinput, $webpagesendinput, $webpagesnonconsecutiveinput, $webpagesnonconsecutivepagenumsinput, $websiteadvancedinfovolume, $websiteadvancedinfoissue, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $dbpagesstartinput, $dbpagesendinput, $dbpagesnonconsecutiveinput, $dbadvancedinfovolume, $dbadvancedinfoissue, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput);
					}
					if ($style=="mla7") {
						mla7magazinecite($style, $medium, $contributors, $articletitleinput, $magazinetitleinput, $datepublishedday, $datepublishedmonth, $datepublishedyear, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $printadvancedinfovolume, $printadvancedinfoissue, $websitetitleinput, $webpagesstartinput, $webpagesendinput, $webpagesnonconsecutiveinput, $webpagesnonconsecutivepagenumsinput, $websiteadvancedinfovolume, $websiteadvancedinfoissue, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $urlwebsiteinput, $dbpagesstartinput, $dbpagesendinput, $dbpagesnonconsecutiveinput, $dbadvancedinfovolume, $dbadvancedinfoissue, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput);
					}
				break;
					
				case "newspaper":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						} 
					}										
					$articletitleinput = filter_input(INPUT_POST,'articletitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$newspapertitleinput = filter_input(INPUT_POST,'newspapertitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					if ($medium=="print") {
						$newspapercityinput = filter_input(INPUT_POST,'newspapercityinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$datepublishedday = filter_input(INPUT_POST,'datepublishedday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$datepublishedmonth = filter_input(INPUT_POST,'datepublishedmonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$datepublishedyear = filter_input(INPUT_POST,'datepublishedyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$editioninput = filter_input(INPUT_POST,'editioninput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$sectioninput = filter_input(INPUT_POST,'sectioninput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$pagesstartinput = filter_input(INPUT_POST,'pagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$pagesendinput = filter_input(INPUT_POST,'pagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$pagesnonconsecutiveinput = filter_input(INPUT_POST,'pagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
						if ($pagesnonconsecutiveinput) {
							$pagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'pagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						}
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($electronicpublishday)) {
                                                    $electronicpublishday = NULL;
                                                }
                                                if (!isset($electronicpublishmonth)) {
                                                    $electronicpublishmonth = NULL;
                                                }
                                                if (!isset($electronicpublishyear)) {
                                                    $electronicpublishyear = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($dbnewspapercityinput)) {
                                                    $dbnewspapercityinput = NULL;
                                                }
                                                if (!isset($dbdatepublisheddateday)) {
                                                    $dbdatepublisheddateday = NULL;
                                                }
                                                if (!isset($dbdatepublisheddatemonth)) {
                                                    $dbdatepublisheddatemonth = NULL;
                                                }
                                                if (!isset($dbdatepublisheddateyear)) {
                                                    $dbdatepublisheddateyear = NULL;
                                                }
                                                if (!isset($dbeditioninput)) {
                                                    $dbeditioninput = NULL;
                                                }
                                                if (!isset($dbpagesstartinput)) {
                                                    $dbpagesstartinput = NULL;
                                                }
                                                if (!isset($dbpagesendinput)) {
                                                    $dbpagesendinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutiveinput)) {
                                                    $dbpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
					}
					if ($medium=="website") {
						$websitetitleinput = filter_input(INPUT_POST,'websitetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$electronicpublishday = filter_input(INPUT_POST,'electronicpublishday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$electronicpublishmonth = filter_input(INPUT_POST,'electronicpublishmonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$electronicpublishyear = filter_input(INPUT_POST,'electronicpublishyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($newspapercityinput)) {
                                                    $newspapercityinput = NULL;
                                                }
                                                if (!isset($datepublishedday)) {
                                                    $datepublishedday = NULL;
                                                }
                                                if (!isset($datepublishedmonth)) {
                                                    $datepublishedmonth = NULL;
                                                }
                                                if (!isset($datepublishedyear)) {
                                                    $datepublishedyear = NULL;
                                                }
                                                if (!isset($editioninput)) {
                                                    $editioninput = NULL;
                                                }
                                                if (!isset($sectioninput)) {
                                                    $sectioninput = NULL;
                                                }
                                                if (!isset($pagesstartinput)) {
                                                    $pagesstartinput = NULL;
                                                }
                                                if (!isset($pagesendinput)) {
                                                    $pagesendinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($dbnewspapercityinput)) {
                                                    $dbnewspapercityinput = NULL;
                                                }
                                                if (!isset($dbdatepublisheddateday)) {
                                                    $dbdatepublisheddateday = NULL;
                                                }
                                                if (!isset($dbdatepublisheddatemonth)) {
                                                    $dbdatepublisheddatemonth = NULL;
                                                }
                                                if (!isset($dbdatepublisheddateyear)) {
                                                    $dbdatepublisheddateyear = NULL;
                                                }
                                                if (!isset($dbeditioninput)) {
                                                    $dbeditioninput = NULL;
                                                }
                                                if (!isset($dbpagesstartinput)) {
                                                    $dbpagesstartinput = NULL;
                                                }
                                                if (!isset($dbpagesendinput)) {
                                                    $dbpagesendinput = NULL;
                                                }
                                                if (!isset($dbpagesnonconsecutiveinput)) {
                                                    $dbpagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
					}
					if ($medium=="db") {
						$dbnewspapercityinput = filter_input(INPUT_POST,'dbnewspapercityinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbdatepublisheddateday = filter_input(INPUT_POST,'dbdatepublisheddateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbdatepublisheddatemonth = filter_input(INPUT_POST,'dbdatepublisheddatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbdatepublisheddateyear = filter_input(INPUT_POST,'dbdatepublisheddateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbeditioninput = filter_input(INPUT_POST,'dbeditioninput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbpagesstartinput = filter_input(INPUT_POST,'dbpagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbpagesendinput = filter_input(INPUT_POST,'dbpagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbpagesnonconsecutiveinput = filter_input(INPUT_POST,'dbpagesnonconsecutiveinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$databaseinput = filter_input(INPUT_POST,'databaseinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateday = filter_input(INPUT_POST,'dbaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdatemonth = filter_input(INPUT_POST,'dbaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateyear = filter_input(INPUT_POST,'dbaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urldbinput = filter_input(INPUT_POST,'urldbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($newspapercityinput)) {
                                                    $newspapercityinput = NULL;
                                                }
                                                if (!isset($datepublishedday)) {
                                                    $datepublishedday = NULL;
                                                }
                                                if (!isset($datepublishedmonth)) {
                                                    $datepublishedmonth = NULL;
                                                }
                                                if (!isset($datepublishedyear)) {
                                                    $datepublishedyear = NULL;
                                                }
                                                if (!isset($editioninput)) {
                                                    $editioninput = NULL;
                                                }
                                                if (!isset($sectioninput)) {
                                                    $sectioninput = NULL;
                                                }
                                                if (!isset($pagesstartinput)) {
                                                    $pagesstartinput = NULL;
                                                }
                                                if (!isset($pagesendinput)) {
                                                    $pagesendinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
                                                if (!isset($websitetitleinput)) {
                                                    $websitetitleinput = NULL;
                                                }
                                                if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($electronicpublishday)) {
                                                    $electronicpublishday = NULL;
                                                }
                                                if (!isset($electronicpublishmonth)) {
                                                    $electronicpublishmonth = NULL;
                                                }
                                                if (!isset($electronicpublishyear)) {
                                                    $electronicpublishyear = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
					}
					
					//Execute the citation
					if ($style=="apa6") {
						apa6newspapercite($style, $medium, $contributors, $articletitleinput, $newspapertitleinput, $newspapercityinput, $datepublishedday, $datepublishedmonth, $datepublishedyear, $editioninput, $sectioninput, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $websitetitleinput, $urlwebsiteinput, $electronicpublishday, $electronicpublishmonth, $electronicpublishyear, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $dbnewspapercityinput, $dbdatepublisheddateday, $dbdatepublisheddatemonth, $dbdatepublisheddateyear, $dbeditioninput, $dbpagesstartinput, $dbpagesendinput, $dbpagesnonconsecutiveinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput);
					}
					if ($style=="mla7") {
						mla7newspapercite($style, $medium, $contributors, $articletitleinput, $newspapertitleinput, $newspapercityinput, $datepublishedday, $datepublishedmonth, $datepublishedyear, $editioninput, $sectioninput, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $websitetitleinput, $urlwebsiteinput, $electronicpublishday, $electronicpublishmonth, $electronicpublishyear, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $dbnewspapercityinput, $dbdatepublisheddateday, $dbdatepublisheddatemonth, $dbdatepublisheddateyear, $dbeditioninput, $dbpagesstartinput, $dbpagesendinput, $dbpagesnonconsecutiveinput, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput);
					}
				break;
				
				case "scholar":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						} 
					}
					$yearpublishedinput = filter_input(INPUT_POST,'yearpublishedinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$articletitleinput = filter_input(INPUT_POST,'articletitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$journaltitleinput = filter_input(INPUT_POST,'journaltitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$volume = filter_input(INPUT_POST,'advancedinfovolume',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$issue = filter_input(INPUT_POST,'advancedinfoissue',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesstartinput = filter_input(INPUT_POST,'pagesstartinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesendinput = filter_input(INPUT_POST,'pagesendinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$pagesnonconsecutiveinput = filter_input(INPUT_POST,'pagesnonconsecutiveinput',FILTER_VALIDATE_BOOLEAN) ?: NULL;
					if ($pagesnonconsecutiveinput) {
						$pagesnonconsecutivepagenumsinput = filter_input(INPUT_POST,'pagesnonconsecutivepagenumsinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					}
					if ($medium=="website") {
						$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doiwebsiteinput = filter_input(INPUT_POST,'doiwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($databaseinput)) {
                                                    $databaseinput = NULL;
                                                }
                                                if (!isset($dbaccessdateday)) {
                                                    $dbaccessdateday = NULL;
                                                }
                                                if (!isset($dbaccessdatemonth)) {
                                                    $dbaccessdatemonth = NULL;
                                                }
                                                if (!isset($dbaccessdateyear)) {
                                                    $dbaccessdateyear = NULL;
                                                }
                                                if (!isset($urldbinput)) {
                                                    $urldbinput = NULL;
                                                }
                                                if (!isset($doidbinput)) {
                                                    $doidbinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
					}
					if ($medium=="db") {
						$databaseinput = filter_input(INPUT_POST,'databaseinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateday = filter_input(INPUT_POST,'dbaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdatemonth = filter_input(INPUT_POST,'dbaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$dbaccessdateyear = filter_input(INPUT_POST,'dbaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$urldbinput = filter_input(INPUT_POST,'urldbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
						$doidbinput = filter_input(INPUT_POST,'doidbinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
                                                
                                                //Defining unused variables as NULL values to prevent errors when passed to ne next function
						if (!isset($urlwebsiteinput)) {
                                                    $urlwebsiteinput = NULL;
                                                }
                                                if (!isset($doiwebsiteinput)) {
                                                    $doiwebsiteinput = NULL;
                                                }
                                                if (!isset($webaccessdateday)) {
                                                    $webaccessdateday = NULL;
                                                }
                                                if (!isset($webaccessdatemonth)) {
                                                    $webaccessdatemonth = NULL;
                                                }
                                                if (!isset($webaccessdateyear)) {
                                                    $webaccessdateyear = NULL;
                                                }
                                                if (!isset($pagesnonconsecutiveinput)) {
                                                    $pagesnonconsecutiveinput = NULL;
                                                }
                                                if (!isset($pagesnonconsecutivepagenumsinput)) {
                                                    $pagesnonconsecutivepagenumsinput = NULL;
                                                }
					}
					
					//Execute the citation
					if ($style=="apa6") {
						apa6scholarjournalcite($style, $medium, $contributors, $yearpublishedinput, $articletitleinput, $journaltitleinput, $volume, $issue, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $urlwebsiteinput, $doiwebsiteinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput);
					}
					if ($style=="mla7") {
						mla7scholarjournalcite($style, $medium, $contributors, $yearpublishedinput, $articletitleinput, $journaltitleinput, $volume, $issue, $pagesstartinput, $pagesendinput, $pagesnonconsecutiveinput, $pagesnonconsecutivepagenumsinput, $urlwebsiteinput, $doiwebsiteinput, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear, $databaseinput, $dbaccessdateday, $dbaccessdatemonth, $dbaccessdateyear, $urldbinput, $doidbinput);
					}
				break;
					
				case "website":
					//Clean and load the variables from the form
					$contributors = array();
					$addidvalue = filter_input(INPUT_POST,'addidvalue');
					for ($i = 0; $i < $addidvalue; $i++) {
						$cselect = filter_input(INPUT_POST,'contributorselect'.$i);
						$fname = filter_input(INPUT_POST,'contributorfname'.$i);
						$mi = filter_input(INPUT_POST,'contributormi'.$i);
						$lname = filter_input(INPUT_POST,'contributorlname'.$i);
						
						$addcontributor = array();
						if ($lname) {
							$addcontributor['cselect'] = $cselect;
							$addcontributor['fname'] = $fname;
							$addcontributor['mi'] = $mi;
							$addcontributor['lname'] = $lname;
							$contributors[] = $addcontributor;
						} 
					}
					$articletitleinput = filter_input(INPUT_POST,'articletitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$websitetitleinput = filter_input(INPUT_POST,'websitetitleinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$publishersponsorinput = filter_input(INPUT_POST,'publishersponsorinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$urlwebsiteinput = filter_input(INPUT_POST,'urlwebsiteinput',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$electronicpublishday = filter_input(INPUT_POST,'electronicpublishday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$electronicpublishmonth = filter_input(INPUT_POST,'electronicpublishmonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$electronicpublishyear = filter_input(INPUT_POST,'electronicpublishyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$webaccessdateday = filter_input(INPUT_POST,'webaccessdateday',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$webaccessdatemonth = filter_input(INPUT_POST,'webaccessdatemonth',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					$webaccessdateyear = filter_input(INPUT_POST,'webaccessdateyear',FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) ?: NULL;
					
					//Execute the citation
					if ($style=="apa6") {
						apa6websitecite($style, $medium, $contributors, $articletitleinput, $websitetitleinput, $publishersponsorinput, $urlwebsiteinput, $electronicpublishday, $electronicpublishmonth, $electronicpublishyear, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear);
					}
					if ($style=="mla7") {
						mla7websitecite($style, $medium, $contributors, $articletitleinput, $websitetitleinput, $publishersponsorinput, $urlwebsiteinput, $electronicpublishday, $electronicpublishmonth, $electronicpublishyear, $webaccessdateday, $webaccessdatemonth, $webaccessdateyear);
					}
				break;
			}
	citationcontainend();
	citationcontainend();
?>