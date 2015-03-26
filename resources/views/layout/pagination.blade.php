<?php
	$start = $page->total() != 0 ? (($page->currentPage() - 1) * $page->perPage()) + 1 : 0 ;
	$end = $page->currentPage() * $page->perPage();
	$total = $page->total();
	$end = $end > $total ? $total : $end;
?>

<div class="pagination-area">
	<div class="pagination-info pull-left">
		@if ($page != "[]") 
		Showing {{ $start }} to {{ $end }} of {{ $total }} entries
		@endif
	</div>
	<div class="text-right pull-right">
		{!! $page->render(); !!}
	</div>
</div>