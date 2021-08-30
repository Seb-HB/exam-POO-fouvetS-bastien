la methode __construct
elle est appelée automatiquement quand on crée un nouvel objet
exemple: $moto=new Moto va automatiquement lancer la méthode __construct de la class Moto.

la méthode __destruct
à l'inverse de __construct, elle est appelée automatiquement quand un objet est détruit.
ça peut être fait par l'utilisateur ou simplement à la fin du script.
par exemple si j'ai precedemment crée $moto= new Moto, lorsque le server aura exécuté toutes les instructions PHP, il appellera la méthode
__destruct de la class Moto pour détruire $moto et libérer de la place mémoire.


la méthode __serialize
elle s'execute en premier lorsqu'on utilise la fonction serialize() et doit retourner un tableau associatif clé valeur
cela permet d'effectuer un traitement préalable avant que la fonction sérialise ne transforme en chaine de charactère
exemple: 
public __serialize(){
    return ['$host'=> $this->host, '$dbName'=> $this->dbName];
}


la méthode __unserialize(array)
elle est appelée automatiquement quand la fonction unserialize() est appelée
elle permet d'effectuer un traitement à partir de 'array' qui est le tableau resultante de unserialize()
ainsi à chaque fois que unserialize est appelée, le traitement qui est dans __unserialize sera effectué
exemple:
public function  __unserialize ($tab){
    $this->host= $tab['host'];
    $this->dbName= $tab['dbName'];

    connect($this->dbName, $this->host);
}
recupère des valeurs dans le tableau issu de unserialise(), les stocke dans les attributs de classe et lance une fonction connect() et ceci à chaque fois qu'on appelle la fonction unserialize()


la methode __get
elle est appelé automatiquement à chaque fois qu'on essae d'acceder à une propriété à laquelle on a pas accès.
si on veut recupérer la valeur (en dehors de la classe) d'un attribut privé, comme on y aura pas accès, on passera automatiquement par __get
exemple:
class Moto{
    private $type;
}
$test=Moto->Type;
public function __get($attrib){
    if (isset($this->$attrib)){
        return $this->$attrib;
    }
}
comme on arrive pas à acceder à Moto->Typequi est privé, on passe dans __get qui va nous le renvoyer.