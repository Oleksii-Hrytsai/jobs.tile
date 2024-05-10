1) New database in core - dump.sql
2) git clone git@github.com:Oleksii-Hrytsai/jobs.tile.git
2) docker-compose up -d --build
3) docker-compose exec php-fpm bash
4) bin/console doctrine:migrations:migrate
5) php bin/console doctrine:fixtures:load

exit container 

6) docker-compose exec manticore bash
7) indexer --all --rotate

<h1>http://localhost:8080</h1>






<h2>1) FACTORY  method GET </h2>
<h4>example: http://localhost:8080/product?factory=cobsa&collection=manual&article=manu7530bcbm-manualbaltic7-5x30</h4>
<h3>Result example</h3>
<h5>{"price":"38,99","factory":"cobsa","collection":"manual","article":"manu7530bcbm-manualbaltic7-5x30"}</h5>


<h2>2) group By method GET</h2>
<h4>example month: http://localhost:8080/orders/stats?page=1&limit=10&groupBy=month</h4>
<h3>Result example</h3>
<h5>{"page":1,"limit":10,"total_pages":1,"data":[{"groupValue":"2024-5","count":2},{"groupValue":"2024-4","count":17},{"groupValue":"2024-3","count":15},{"groupValue":"2024-2","count":14},{"groupValue":"2024-1","count":22}]}</h5>

<h4>example day: http://localhost:8080/orders/stats?page=1&limit=10&groupBy=day</h4>
<h3>Result example</h3>
<h5>{"page":1,"limit":10,"total_pages":5,"data":[{"groupValue":"2024-5-5","count":2},{"groupValue":"2024-4-9","count":4},{"groupValue":"2024-4-6","count":1},{"groupValue":"2024-4-4","count":2},{"groupValue":"2024-4-3","count":1},{"groupValue":"2024-4-29","count":1},{"groupValue":"2024-4-25","count":1},{"groupValue":"2024-4-22","count":1},{"groupValue":"2024-4-18","count":1},{"groupValue":"2024-4-17","count":1}]}</h5>

<h4>example year: http://localhost:8080/orders/stats?page=1&limit=10&groupBy=year</h4>
<h3>Result example</h3>
<h5>{"page":1,"limit":10,"total_pages":1,"data":[{"groupValue":2024,"count":70}]}</h5>
<h5></h5>


<h2>3) SOAP</h2>
<h4>method GET Example: http://localhost:8080/soap/wsdl</h4>
<h5>download file result:</h5>

<h7><?xml version="1.0" encoding="UTF-8"?>
<definitions xmlns="http://schemas.xmlsoap.org/wsdl/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:tns="/soap/server" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap-enc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/" name="OrderService" targetNamespace="/soap/server"><types><xsd:schema targetNamespace="/soap/server"/></types><portType name="OrderServicePort"><operation name="getOrder"><documentation>getOrder</documentation><input message="tns:getOrderIn"/></operation><operation name="addOrder"><documentation>addOrder</documentation><input message="tns:addOrderIn"/></operation><operation name="updateOrder"><documentation>updateOrder</documentation><input message="tns:updateOrderIn"/></operation><operation name="deleteOrder"><documentation>deleteOrder</documentation><input message="tns:deleteOrderIn"/></operation></portType><binding name="OrderServiceBinding" type="tns:OrderServicePort"><soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/><operation name="getOrder"><soap:operation soapAction="/soap/server#getOrder"/><input><soap:body use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="/soap/server"/></input></operation><operation name="addOrder"><soap:operation soapAction="/soap/server#addOrder"/><input><soap:body use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="/soap/server"/></input></operation><operation name="updateOrder"><soap:operation soapAction="/soap/server#updateOrder"/><input><soap:body use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="/soap/server"/></input></operation><operation name="deleteOrder"><soap:operation soapAction="/soap/server#deleteOrder"/><input><soap:body use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/" namespace="/soap/server"/></input></operation></binding><service name="OrderServiceService"><port name="OrderServicePort" binding="tns:OrderServiceBinding"><soap:address location="/soap/server"/></port></service><message name="getOrderIn"><part name="id" type="xsd:anyType"/></message><message name="addOrderIn"><part name="order" type="xsd:anyType"/></message><message name="updateOrderIn"><part name="order" type="xsd:anyType"/></message><message name="deleteOrderIn"><part name="id" type="xsd:anyType"/></message></definitions>
</h7>


<h2>4) Search</h2>
<h4>method GET Example: http://localhost:8080/search?id=5</h4>

<h7>
[{"id":5,"email":"hoppe.estelle@yahoo.com","status":"3","create_date":"2024-03-31 11:11:23","currency":"GBP","carrier_name":"Bartell Inc","description":"In alias velit accusamus eveniet alias. Nemo numquam in quod dolores repellat vel nesciunt dicta. Dolores quod quod sit voluptas. Quis sed quod sequi ratione ut.","proposed_date":"2024-02-06 10:47:54","client_name":"Torey"}]
</h7>


