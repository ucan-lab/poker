ポーカー
https://qiita.com/Nabetani/items/cbc3af152ee3f50a822f

## 要件

5枚のカードを示す文字列を入力とし、ポーカーの役を出力せよ。
ただし:

一枚のカードは、スートを表す文字＋ランクを表す文字列 で構成される。
スートを表す文字は、S, H, D, C のいずれか
ランクを表す文字列は、2, 3, ..., 9, 10, J, Q, K, A のいずれか
下表の役に対応すること。下表の役に該当しない場合は '--' を出力すること。
カードはジョーカーを含まない52枚から5枚が選ばれる。
不正な入力への対応は不要。

対応すべき役と、その役だった場合に出力する文字列は以下のとおり：

フォーカード : 4K
フルハウス : FH
スリーカード : 3K
ツーペア : 2P
ワンペア : 1P
上記のいずれにも該当しない : --
例えば、入力が「D3C3C10D10S3」ならフルハウスなので「FH」と出力する。
入力が「S8D10HJS10CJ」ならツーペアなので「2P」と出力する。

## 動作確認

```
$ git clone git@github.com:ucan-lab/poker.git
$ cd poker
$ docker-compose run --rm composer install
$ docker-compose run --rm app php poker.php
DASAD10CAHA: 4K
S10HJDJCJSJ: 4K
S10HAD10DAC10: FH
HJDJC3SJS3: FH
S3S4H3D3DA: 3K
S2HADKCKSK: 3K
SASJDACJS10: 2P
S2S10H10HKD2: 2P
CKH10D10H3HJ: 1P
C3D3S10SKS2: 1P
S3SJDAC10SQ: --
C3C9SAS10D2: --
```
