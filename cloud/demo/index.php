<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="GBK">
	<link href="http://a.tbcdn.cn/s/kissy/1.2.0/cssreset/reset-min.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://a.tbcdn.cn/s/kissy/1.2.0/kissy-min.js"></script>
	<script src="http://a.tbcdn.cn/apps/etao/common/120220/etao-hf.js"></script>
	<title></title>
</head>
<body>
	<div id="J_RankBoard" class="cell-rank-board"></div>


	<script type="text/javascript">
		KISSY.ready(function (S) {
			var D = S.DOM, E = S.Event, $ = S.all;
			
	        S.add('etao/component/rankBoard', {
	                    fullpath: 'http://assets.etao.net/apps/e/component/120726/rankBoard.js',
	                    cssfullpath:'http://assets.etao.net/apps/e/component/120726/rankBoard.css'});
	        
			S.use('etao/component/rankBoard', function (S, rankBoard) {
	            new rankBoard({
	                container: '#J_RankBoard',
					Idata: 'http://daogou.etao.com/api/phb.php'
	               
				});
			});


		});
	</script>
	<script type="text/javascript">
		window.onload = function(){
			var D = KISSY.DOM,
				iframe = parent.document.getElementById('C-demo'),
				docHeight = D.docHeight();

			iframe.height = docHeight;
		};
	</script>
</body>
</html>
