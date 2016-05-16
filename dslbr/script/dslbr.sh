#!/bin/bash

clear
echo ' ______  ______ _       ______  ______  '
echo '(______)/ _____|_)     (____  \(_____ \ '
echo ' _     ( (____  _       ____)  )_____) )'
echo '| |   | \____ \| |     |  __  (|  __  / '
echo '| |__/ /_____) ) |_____| |__)  ) |  \ \ '
echo '|_____/(______/|_______)______/|_|   |_|'
echo 

##########################
# Created by Maik Alberto#
# maik.alberto@bol.com.br#
##########################

    case $1 in

#====>Ajuda
        -h) 
           echo Uso: $0 [-virh]
           echo '-v      Versao'
           echo '-i      Instalar'
           echo '-r      Restaurar'
           echo '-h      Ajuda'
          ;;

#=====>Versao
        -v) echo Versao DSL-BR;;                  

#=====>Instalar
     -i|'') 
#clear

#echo "PROJETO DSL-BR"
echo

sudo rm -f *.dslbr 2>/dev/null

ver=`cat /usr/share/doc/dsl/release.txt`
sudo wget http://www.powerline.com.br/~maik/dsl/mapper/dslrep/$ver/chave.key

rev chave.key | sed 's/.\{1,6\}//' > abre.key 2>/dev/null
rev abre.key > cadeado.key 2>/dev/null
rev cadeado.key | cut -d '/' -f1 > guarda.key 2>/dev/null
rev guarda.key > algo.key 2>/dev/null
cp cadeado.key caminhos.reg 2>/dev/null
cp algo.key arquivos.reg 2>/dev/null

extdbr=".dslbr" 
b=".bck"
x=`wc -l chave.key | awk {'print $1'}`

y=0
until [ $y = $x ]; do
y=`expr $y + 1`
file=`sed -n -e $y"p" arquivos.reg`
sudo wget http://www.powerline.com.br/~maik/dsl/mapper/dslrep/$ver/$file$extdbr
done

y=0
until [ $y = $x ]; do
y=`expr $y + 1`
file=`sed -n -e $y"p" caminhos.reg`
if [ -e $file$b ]
then
>/dev/null
else
sudo cp $file $file$b >/dev/null
fi
done

y=0
until [ $y = $x ]; do
y=`expr $y + 1`
filea=`sed -n -e $y"p" arquivos.reg`
fileb=`sed -n -e $y"p" caminhos.reg`
sudo cp $filea$extdbr $fileb 2>/dev/null
done

rm -f *.key 2>/dev/null

echo "Traduzido"
          ;;          

-s)clear; echo '|\       /|';echo '| |. _  | |';echo ' \ \\0 / / ';echo '  \_( )_/  ';echo '    | |\   ';echo '    ` `    '; 
;;

#=====>Restaurar
        -r)

if [ -e caminhos.reg ]
then

b=".bck"
x=`wc -l caminhos.reg | awk {'print $1'}`

y=0
until [ $y = $x ]; do
y=`expr $y + 1`
fileb=`sed -n -e $y"p" caminhos.reg`
sudo cp $fileb$b $fileb 2>/dev/null
sudo rm -f $fileb$b 2>/dev/null
done
sudo rm -f *.reg 2>/dev/null
echo "Restauracao efetuada"
else
echo "Faltando arquivo de registro"
fi
;;



    esac
