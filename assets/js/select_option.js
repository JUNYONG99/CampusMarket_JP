function categoryChange(j) {
  var good_a = [
    "映像デザイン科",
    "視覚デザイン科",
    "ファッションデザイン科",
    "繊維衣裳コーディネート科",
    "Eスポーツ科",
  ];
  var good_b = [
    "環境造園科",
    "ガーデニング専攻",
    "フローリスト専攻",
    "庭園文化産業専攻",
    "ペット科",
    "バイオ生命科学科",
    "幼児教育科",
    "食品栄養学科",
    "ホテル外食ベーカリー科",
  ];
  var good_c = [
    "写真映像メディア科",
    "グラフィックコミュニケーション科",
    "メディアコンテンツ科",
    "ITソフトウェア科",
    "AIソフトウェア科",
    "情報通信保安課",
    "VRゲームコンテンツ科",
  ];
  var good_d = [
    "マーケティング学科",
    "スマート事務経営科",
    "税務会計科",
    "ホテル観光科",
    "観光サービス中国語科",
    "航空サービス科",
    "社会福祉科",
    "保育福祉科",
  ];
  var good_e = [
    "物理療法学科",
    "放射線学科",
    "歯技工学科",
    "歯科衛生学科",
    "ビューティーケア科",
    "保健医療行政学科",
    "スポーツリハビリテーション科",
  ];
  var good_f = [
    "スマート建設情報科",
    "知的空間情報学科",
    "室内建築科",
    "建築学科",
  ];

  var target = document.getElementById("good");

  if (j.value == "a") var h = good_a;
  else if (j.value == "b") var h = good_b;
  else if (j.value == "c") var h = good_c;
  else if (j.value == "d") var h = good_d;
  else if (j.value == "e") var h = good_e;
  else if (j.value == "f") var h = good_f;

  target.options.length = 0;

  for (x in h) {
    var opt = document.createElement("option");
    opt.value = h[x];
    opt.innerHTML = h[x];
    target.appendChild(opt);
  }
}
