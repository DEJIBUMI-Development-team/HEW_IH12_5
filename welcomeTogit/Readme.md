# Git GitHubの使い方 ~How to use git and git hub~
以下に使用方法を記載する。
ファイル取り込み～プルリクエストまで

# Github Gitとは何か ~What is Git and GitHub~
*What is Git?* :　<https://tcd-theme.com/2019/12/what-is-git.html?gclid=CjwKCAjw2OiaBhBSEiwAh2ZSP3-Y5SFGOXhk6btMOWm2A64TKsL3Zkhc03IFZI35CziB9E27oCcaPhoC024QAvD_BwE>
*What is Github?* : <https://github.co.jp/>

## 新規ファイルを「C:\xampp\htdocs\新規ファイル」 というような構成で作成
リモートリポジトリのファイル(github上のファイル)を取り込むために、新規ファイルを作成してください。

## GitHub上のファイルを、ローカル(My PC)に取り込む ~How to clone remote-repo-faile~
まずgithub上のファイルを取り込んで作業を行いたい場合、「git clone」コマンドを使います。
URLには、GitHubの[code]から[https]の下記に指定されている。

```
$ git clone "git-hub-code-url"
```

## 初期ブランチである、【master】ブランチに遷移　※(master)が表示されないとき
バージョン管理を行っているファイルは"HEW_IH12_5"に遷移します。*ctrl+@*から、新規ファイルの*git bash*に入ってください

```
$ cd HEW_IH12_5
```

## ※Git初期設定が行っていない場合 ~If you have not completed the initial setup of Git~
gitの初期設定が終わっていない場合、正常にaddやcommitが使えない可能性があります。
そのため、githubにアカウント登録した際のuserNameとemailをconfigファイルに登録する必要があります。

```
$ git config --global user.name "github-userName"
```
```
$ git config --global user.email github@email
```

**Gitをvscodeで使用する場合は以下も入力**

```
$ git config --globa code.editor "code --wait"
```

## ローカルmasterブランチに開発用のブランチを取り込む　~How to git pull~
今回は「developブランチ」を取り込むことを前提とします。
ブランチを取り込む際は「git pull」コマンドを用います。

```
$ git pull origin develop(取り込みたいブランチ名)
```

## masterブランチから枝わかれさせる(ブランチを切る) ~How to create branch~
ファイルを取り込むことができましたが、masterブランチ上で作業を行ってはいけません。
masterブランチから枝分かれをさせ、開発用ブランチを作成しましょう。
方法は「git checkout」コマンドに「-b」という引数を渡します(覚え方は-ブランチのb) 

```
$ git checkout -b create-git-branch
```

ここのcreate-gitbrachの部分は
- create_header
- dev_login
- feature_edit
といった**何を作っているのか一目でわかる**ブランチ名にしましょう
このコマンドを入力したら、

## 開発
*workTree* → add → commit 

ここまで来たら、開発を開始できます。

## ファイル情報をステージングする
workTree → *add* → commit 

一通り開発を行ったら、ステージングしましょう。
ステージングとは、Git commitする前の事前準備です。add をしてから commitする必要があります。
 
**全ファイルステージング**

```
$ git add .
```
**対象ファイルをステージング**

```
$ git add パス名
```

## ファイルをコミットする。
workTree → add → *commit*  

コミットを行うことで、そこまでのファイルの変更点をスナップショットで保存することができます。

**コマンドだけで行う場合**

```
$ git commit -m "コミットメッセージ"
```

**楽に行う場合**

```
$ git commit
```

コミットメッセージは
- create ○○
- dev ○○
など、わかりやすいメッセージにしましょう

## GitHub(リモートリポジトリ)にローカルブランチのコミットをアップロードする~How to push commit-info~
GitHub(remote-repo)に積み重ねたコミットをアップロードする場合は以下の通りです。

```
$ git push origin branch名
```

アップロード済みの既存リポジトリにpushする場合でも同様のコマンドを実行してください。

## ブランチを切り替える~How to change branch~
ブランチを切り替えた場合は以下のコマンドを実行します。

```
$ git checkout 移動したいbranch名
```

※現在作業しているブランチ上でcommitが完了していない場合、エラーを吐きます。**git stash**コマンドなど実行し、変更を退避してからcheckoutを行ってください。

## ブランチの削除~How to delete branch~
ブランチの削除は対象ブランチから離れて実行してください。

```
$ git branch -d branch名
```

でできますが、実行できない場合は引数を*-D*に変更してください。
-Dは強制実行コマンドになります。