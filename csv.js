'use strict'

//CSV出力＆ダウンロード
const download = document.getElementById("download");

download.addEventListener('click',()=>{
    let bom = new Uint8Array([0xEF, 0xBB, 0xBF]); 
    let table = document.getElementById('mainlist'); 
    let data_csv=""; 
    
    for(let i = 0;  i < table.rows.length; i++) {
        for(let j = 0; j < table.rows[i].cells.length; j++) {
            data_csv += table.rows[i].cells[j].innerText;
            if(j == table.rows[i].cells.length-1) data_csv += "\n";
            else data_csv += ","; 
        }
    }
    
    const filename = "download.csv";
    let blob = new Blob([ bom, data_csv], { "type" : "text/csv" }); //data_csvのデータをcsvとしてダウンロードする関数

    const url = (window.URL || window.webkitURL).createObjectURL(blob);
        //ダウンロード用にリンクを作成する
        const download = document.createElement("a");
        //リンク先に上記で生成したURLを指定する
        download.href = url;
        //download属性にファイル名を指定する
        download.download = filename;
        //作成したリンクをクリックしてダウンロードを実行する
        download.click();
        //createObjectURLで作成したオブジェクトURLを開放する
        (window.URL || window.webkitURL).revokeObjectURL(url);

});
