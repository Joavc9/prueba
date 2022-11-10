<?php
class WebService{
    private $token;
    private $sessionName;
    private $data;
    private $params;
    /* Logica para obtner data del webservice */
    public function __construct()
    {
        $this->token = "";
        $this->sessionName = "";
        $this->data = "";
        $this->params = "";
    }
    /* Funtion for get Data webservice */
    public function getDataModel(){
        $responseToken = $this->getWsToken();
        $this->token = json_decode($responseToken)->result->token;
        $responseSession = $this->getWsLogin();
        $this->sessionName = json_decode($responseSession)->result->sessionName;
        $responseData = json_decode($this->getDataQuery())->result;
        $dataArray = [];
        foreach($responseData as $data){
            array_push($dataArray,['id' => $data->id,'contact_no' => $data->contact_no,'lastname'=> $data->lastname,'createdtime' => $data->createdtime]);
        }
        return json_encode($dataArray);
    }
    /* Funtion for get token webservice */
    public function getWsToken(){
        $this->params = "?operation=getchallenge&username=prueba";
        return $this->wsConnect();
    }
    /* Funtion for login to webservice */
    public function getWsLogin(){
        $this->params = null;
        $this->data = [
            'operation' => 'login',
            'username' => 'prueba',
            'accessKey' => md5($this->token.'3DlKwKDMqPsiiK0B')
        ];
        return $this->wsConnect();
    }
     /* Funtion for get data webservice */
    public function getDataQuery(){
        $this->data = null;
        $this->params = "?operation=query&sessionName={$this->sessionName}&query=".urlencode("select * from Contacts;");
        return $this->wsConnect();
    }
     /* Funtion for connect webservice */
    public function wsConnect(){
        $params = $this->params ? $this->params : "";
        $start = curl_init();
        curl_setopt($start,CURLOPT_URL,"https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php{$params}");
        if(is_array($this->data)){
            curl_setopt($start, CURLOPT_POST, true);
            curl_setopt($start, CURLOPT_POSTFIELDS, http_build_query($this->data));
            curl_setopt($start, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
        }
        curl_setopt($start,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($start);
        if(curl_error($start)){
            return "error";
        }
        return $result;
        curl_close($start);
    }
}
