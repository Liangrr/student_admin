//工厂模式
var manager = (function(){
	var _tbody = $('#tbd');
    var $saveBtn = $('#wq-save-score');
//  添加按钮的内容
    var $sName =$("#wq-name");
    var $sSex =$("#wq-sex");
    var $sAge =$("#wq-age");
    var $sGrade = $("#wq-grade");
    var $sAccount = $("#wq-account");
    var $sPwd =$("#wq-pwd");

	return {
//		初始化函数
		init(){
			this.getDate();
			this.events();
		},
//		遍历一遍数据库获取数据
		getDate(){
			var _this = this;
			$.post('php/manager.php',function(json){
				if (json.code==200) {
					_this.insertDate(json);
				}
			},'json');
		},
//		插入数据函数
		insertDate(json) {
			_tbody.html('');
			var data = json.data;
			for (var i=0;i<data.length;i++) {
				var _tr = $('<tr></tr>');
				_tr.attr("class","tr");
				for (var j=0;j<data[i].length;j++) {
					var _td = $('<td></td>');
					_td.append(data[i][j]);
					_tr.append(_td);
				}
				var _td = $('<td></td>');
				var _updateBtn = $('<button>更新</button>');
				var _delBtn = $('<button>删除</button>');
				_updateBtn.attr("class","btn btn-warning");
				_delBtn.attr("class","btn btn-danger");
				_td.append(_updateBtn);
				_td.append(_delBtn);
				_tr.append(_td);
				_tbody.append(_tr);
			}
		},
//		删除函数
		delDate(id,tr){
			var params = {
				id:id
			}
			$.post('php/del.php',params,function (json){
				if(json.code==200){
					tr.remove();
				}
			},'json');
		},
//		添加函数
		addDate(json){
//			把新建的插入的一行数据加到所有数据的数组里
//			allData.push(json.data);
//			然后重新执行遍历数组数据
			this.insertDate(json);
		},
		events(){
			var _this = this;
			
//			添加按钮
			$saveBtn.on('click',function(){
				var params = {
				    name:$sName.val(),
				    sex:$sSex.val(),
				   	age:$sAge.val(),
				    grade:$sGrade.val(),
				    username:$sAccount.val(),
				    password:$sPwd.val()
				}
				$.post('php/insert.php',params,function(json){
					if (json.code==200) {
					_this.addDate(json);
					}
				},'json');
			});
			
//			删除按钮
			_tbody.on('click','.btn-danger',function(){
//				jq获取到tr
				var $tr = $(this).closest('tr');
//				获取到id的值
				var $id = $tr.find('td').eq(0).html();
//				把id,tr传到删除函数
				_this.delDate($id,$tr);
			});	
			
//			修改按钮
			_tbody.on('click','.btn-warning',function(){
				$(this).html('确定').attr('class','btn btn-success');
//				jq获取到tr
				var $tr = $(this).closest('tr');
				var tdAll = $tr.find('td');
				for (var i=1;i<tdAll.length-1;i++) {
					var val = tdAll.eq(i).html();
					console.log(val);
					tdAll.eq(i).html(`<input type='text' value=${val}></input>`);
				}
				
			});
//			确定按钮
			_tbody.on('click','.btn-success',function(){
				var _this = this;
//				jq获取到tr
				var $tr = $(this).closest('tr');
				var tdAll = $tr.find('td');
//				获取数据传到后台判断是否正确
				var params = {
					id:tdAll.eq(0).html(),
					name:tdAll.eq(1).find('input').val(),
					sex:tdAll.eq(2).find('input').val(),
					age:tdAll.eq(3).find('input').val(),
					grade:tdAll.eq(4).find('input').val(),
					username:tdAll.eq(5).find('input').val(),
					password:tdAll.eq(6).find('input').val()
				}
				$.post('php/update.php',params,function(json){
//					如果正确执行这里,获取输入框的值并且进行更新
					if (json.code==200) {
						$(_this).html('更新').attr('class','btn btn-warning');
						for (var i=1;i<tdAll.length-1;i++) {
							var val = tdAll.eq(i).find('input').val();
							tdAll.eq(i).html(val);
						}	
					}
					
				},'json');
				
			});
			
		}
	}

})();
manager.init();
