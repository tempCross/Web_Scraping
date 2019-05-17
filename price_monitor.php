<?php
# Initialization
include("LIB_parse.php");
include("LIB_http.php");
$product_array=array();
$product_count=0;
$heading_cell=0;

$target = "http://www.WebbotsSpidersScreenScrapers.com/buyair";
$web_page = http_get($target, "");

$table_array = parse_array($web_page['FILE'], "<table", "</table>");

for($xx=0; $xx<count($table_array); $xx++)
	{
		$table_landmark = "Products For Sale";
						if(stristr($table_array[$xx], $table_landmark))
				{
				echo "FOUND: Product table\n";
				$product_row_array = parse_array($table_array[$xx], "<tr", "</tr>");
				for($table_row=0; $table_row<count($product_row_array); $table_row++)
					{
						$heading_landmark ="Condition"; 
						if((stristr($product_row_array[$table_row], $heading_landmark)))
							{
								echo "FOUND: Table heading row\n";
								$table_cell_array = parse_array($product_row_array[$table_row], "<td", "</td>");
								for($heading_cell=0; $heading_cell<count($table_cell_array); $heading_cell++)
									{
										if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "ID#"))
											$id_column=$heading_cell;
										if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "Product name"))
											$name_column=$heading_cell;
										if(stristr(strip_tags(trim($table_cell_array[$heading_cell])), "Price"))
											$price_column=$heading_cell;
									}
								echo "FOUND: id_column=$id_column\n";
								echo "FOUND: price_column=$price_column\n";
								echo "FOUND: name_column=$name_column\n";
							}
					}
				}
	}
?>