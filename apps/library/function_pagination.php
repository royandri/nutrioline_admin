<?php
function paginate_one($reload, $id, $tpages) {
	$out="<ul class='pagination'>";
			$total_no_of_pages=$tpages;
			$current_page=1;
			if($id>1)
			{
				$current_page=$id;
			}
			
			if($current_page!=1)
			{
				$previous =$current_page-1;
				$out.="<li><a href='".$reload."1'>First</a></li>";
				$out.="<li><a href='".$reload."".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					$out.="<li><a href='".$reload."".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					$out.="<li><a href='".$reload."".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				$out.="<li><a href='".$reload."".$next."'>Next</a></li>";
				$out.="<li><a href='".$reload."".$total_no_of_pages."'>Last</a></li>";
			}
			$out.="</ul>";
	return $out;
}
?>