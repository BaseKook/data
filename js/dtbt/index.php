<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="utf-8">  
    <title>头疼</title>  
</head>  
<style type="text/css">  
      
    button{  
        position: absolute;  
        margin: 10px;  
    }  
</style>  
<body>  
    <button onclick="change()">更换数据</button>  
    <script type="text/javascript" src='./d3.v3.min.js'></script>  
    <script type="text/javascript">  
     var flname = "公共汽车|城市客车|学校巴士|长途巴士";
            flname = flname.split("|");
        var flsjsl = "40|25|20|15";
            flsjsl = flsjsl.split("|");
        var date = ["12","25","33","17"];
    function xiaoxiao(lssj){
        var width = 200;  
        var height = 200;  
          console.log(lssj);
        var dataset = lssj;
        var outerRadius = 90; //外半径  
            var innerRadius = 0; //内半径，为0则中间没有空白  
        var arc = d3.svg.arc() //弧生成器  
                .innerRadius(innerRadius) //设置内半径  
                .outerRadius(outerRadius); //设置外半径  
        var color = d3.scale.ordinal()//颜色
                               .range(["#535aaa","#d7dae3","#a059a5","#feb229"]);
        var pie = d3.layout.pie()   //饼图布局  
            .sort(null)             //不排序，不写则会从大到小，顺时针排序。  
            .value(function(d){  return d[1]});     //设置value值为上面的2二维数组中的数字  
        var piedata=pie(dataset);  
        var svg = d3.select("body")             //添加一个svg并且设置宽高  
                .append("svg")  
                .attr("width", width)  
                .attr("height", height);  
  
         var arcs=svg.selectAll(".arc")               
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "arc")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")   //将圆心平移到svg的中心  
            .append("path")  
            .attr("fill", function(d, i) {  
                return color(i);            //根据下标填充颜色  
            })  
            .attr("d", function(d, i) {  
                return arc(d);              ///调用上面的弧生成器  
            });  
  
         var text=svg.selectAll(".text")  
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "text")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")  
            .append("text")  
            .style('text-anchor', function(d, i) {  
                //根据文字在是左边还是右边，在右边文字是start，文字默认都是start。  
                return (d.startAngle + d.endAngle)/2 < Math.PI ? 'start' : 'end';  
            })  
            .attr('transform', function(d, i) {  
                var pos = arc.centroid(d);      //centroid(d)计算弧中心  
                pos[0]=outerRadius*((d.startAngle+d.endAngle)/2<Math.PI?1.4:-1.4)  
                pos[1]*=2.1;                    //将文字移动到外面去。  
                return 'translate(' + pos + ')';  
            })   
  
         var text2=svg.selectAll(".text2")  
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "text")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")  
            .append("text")  
            .style('text-anchor',"middle")  
            .attr('transform', function(d, i) {  
                var pos = arc.centroid(d);          //将数字放在圆弧中心  
                return 'translate(' + pos + ')';  
            }) 
            .attr("font-size", "0.8em") 
            .text(function(d) {  
                return d.data[1];  
            })  
            this.changeData = function(cssj){  
                random(cssj)  
                console.log(dataset);
                var pie2=pie(dataset);  
                piedata.forEach(function(d,i){  
                    d.laststartAngle=d.startAngle;  
                    d.lastendAngle=d.endAngle;  
                    d.startAngle=pie2[i].startAngle;  
                    d.endAngle=pie2[i].endAngle;  
                })  
                arcs.data(piedata)  
                    .transition().duration(800)  
                    .attrTween("d", tweenArc(function(d, i) {  
                    return {  
                        startAngle: d.laststartAngle,  
                        endAngle: d.lastendAngle,  
                    };  
                }))   
                text2.data(piedata)  
                    .transition().duration(800)  
                    .attr('transform', function(d, i) {  
                        var pos = arc.centroid(d);  
                        return 'translate(' + pos + ')';  
                    }).text(function(d) {  
                        return d.data[1];  
                    }); 
            }  
             function random(cssj){  
                    var n=4;  
                    while(n--){dataset[n][1]=cssj[n]}  
                }  
             function tweenArc(b) {  
                return function(a, i) {  
                    var d = b.call(this, a, i),  
                        i = d3.interpolate(d, a);  
                    return function(t) {  
                        return arc(i(t));  
                    };  
                };  
             } 
} 
function bingtujisuan(flsjsl){
        var zs = 0;
        for(i=0;i<flsjsl.length;i++){
            zs += Number(flsjsl[i]);
        }
        for(i=0;i<flsjsl.length;i++){
            flsjsl[i] /= zs;
            flsjsl[i] = Math.round(flsjsl[i].toFixed(2)*100);

        }
}
            bingtujisuan(flsjsl);
         console.log(flsjsl);
        var zjnasl = [];
            for(i=0;i<flsjsl.length;i++){
                zjnasl.push([flname[i],flsjsl[i]])
            }
            console.log(zjnasl);
        rhtmid = new xiaoxiao(zjnasl);
function change(){
    rhtmid.changeData(date);
}
    </script>  
}
</body>  
</html>  