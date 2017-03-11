package main

import (
	"encoding/json"
	"errors"
	"fmt"
	"strings"

	"github.com/hyperledger/fabric/core/chaincode/shim"
)

// SimpleChaincode example simple Chaincode implementation
type SimpleChaincode struct {
}

//global variable of indexs and values
var iot_key = "_iot_key"
var event_key = "_event_key"

type Property struct {
	Id    string `json:"PROPERTY_ID"`
	Value string `json:"VALUE"`
}

type Iot struct {
	Id       string `json:"IOT_ID"`
	Model    string `json:"MODEL"`
	Property string `json:"PROPERTY"`
	Id_event string `json:"EVENT_ID"`
}

type Event struct {
	Id       string `json:"EVENT_ID"`
	Id_car   string `json:"CAR_ID"`
	Owner    string `json:"OWNER"`
	Day_code string `json:"DAY_CODE"`
	Location string `json:"LOCATION"`
	Image    string `json:"IMAGE"`
	Describe string `json:"DESCRIBE"`
	Iot      string `json:"IOT"`
}

type AllEvent struct {
	Events []Event `json:"EVENTS"`
}

// ============================================================================================================================
// Main
// ============================================================================================================================
func main() {
	err := shim.Start(new(SimpleChaincode))
	if err != nil {
		fmt.Printf("Error starting Simple chaincode: %s", err)
	}
	fmt.Printf("fuck fuck main")
}

// Init resets all the things
func (t *SimpleChaincode) Init(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	//just prepare for search
	var all_event AllEvent

	//init the values
	jsonAsBytes, _ := json.Marshal(all_event)
	err := stub.PutState(event_key, jsonAsBytes)
	if err != nil {
		return nil, err
	}
	return nil, nil
}

// Invoke is our entry point to invoke a chaincode function
func (t *SimpleChaincode) Invoke(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	// Handle different functions
	if function == "init" { //initialize the chaincode state, used as reset
		return t.Init(stub, "init", args)
	} else if function == "PutEvent" {
		return t.PutEvent(stub, args)
	}
	fmt.Println("invoke did not find func: " + function) //error

	return nil, errors.New("Received unknown function invocation: " + function)
}

// Query is our entry point for queries
func (t *SimpleChaincode) Query(stub shim.ChaincodeStubInterface, function string, args []string) ([]byte, error) {
	fmt.Println("query is running " + function)

	// Handle different functions
	if function == "GetTimeline" {
		return t.GetTimeline(stub, args)
	} else if function == "GetInsuranceEvent" {
		return t.GetInsuranceEvent(stub, args)
	} else if function == "read" {
		return t.read(stub, args)
	}
	fmt.Println("query did not find func: " + function) //error

	return nil, errors.New("Received unknown function query: " + function)
}

func (t *SimpleChaincode) PutEvent(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	var event Event
	var err error
	fmt.Println("running PutEvent()")

	if len(args) != 8 {
		return nil, errors.New("[PutEvent] Incorrect number of arguments. Expecting 11.")
	}

	//put all parameters to event
	event.Id = args[0]
	event.Id_car = args[1]
	event.Owner = args[2]
	event.Day_code = args[3]
	event.Location = args[4]
	event.Image = args[5]
	event.Describe = args[6]
	event.Iot = args[7]

	//split Iot informations, get the number of IOTs
	iot_infos := strings.Split(event.Iot, "|")
	fmt.Printf("There are %d IOTs.", len(iot_infos))

	//return nil, errors.New("Get point B：" + args[7])
	//save event to BlockChain
	tmpBytes, err := stub.GetState(event_key)
	if err != nil {
		return nil, errors.New("Failed to get events")
	}
	var all_events AllEvent
	json.Unmarshal(tmpBytes, &all_events)
	all_events.Events = append(all_events.Events, event)
	//cache, _ := json.Marshal(all_events)
	//return nil, errors.New("No fuck fuck fuck fuck " + string(cache))
	jsonAsBytes, _ := json.Marshal(all_events)
	//return nil, errors.New("Get point C：" + args[7])
	err = stub.PutState(event_key, jsonAsBytes) //rewrite open orders
	if err != nil {
		return nil, err
	}
	//return nil, errors.New("Get point D：" + args[7])
	return nil, nil
}

func (t *SimpleChaincode) GetTimeline(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	var car_id, jsonResp string
	var err error

	if len(args) != 1 {
		return nil, errors.New("Incorrect number of arguments. Expecting id of the event to query")
	}

	car_id = args[0]

	//get all of the car_ids here
	tmpBytes, err := stub.GetState(event_key)
	if err != nil {
		jsonResp = "{\"Error\":\"Failed to get state for " + car_id + "\"}"
		return nil, errors.New(jsonResp)
	}
	var all_events AllEvent
	json.Unmarshal(tmpBytes, &all_events)
	var processed AllEvent
	for i := range all_events.Events {
		event_car_id := all_events.Events[i].Id_car
		if event_car_id == car_id {
			processed.Events = append(processed.Events, all_events.Events[i])
		}
	}
	jsonAsBytes, _ := json.Marshal(processed)

	return jsonAsBytes, nil
}

func (t *SimpleChaincode) GetInsuranceEvent(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	var car_id, jsonResp string
	var err error

	if len(args) != 1 {
		return nil, errors.New("Incorrect number of arguments. Expecting id of the event to query")
	}

	car_id = args[0]

	//get all of the car_ids here
	tmpBytes, err := stub.GetState(event_key)
	if err != nil {
		jsonResp = "{\"Error\":\"Failed to get state for " + car_id + "\"}"
		return nil, errors.New(jsonResp)
	}
	var all_events AllEvent
	json.Unmarshal(tmpBytes, &all_events)
	var processed AllEvent
	for i := range all_events.Events {
		event_car_id := all_events.Events[i].Id_car
		if event_car_id == car_id {
			processed.Events = append(processed.Events, all_events.Events[i])
		}
	}

	jsonAsBytes, _ := json.Marshal(processed)

	return jsonAsBytes, nil
}

func (t *SimpleChaincode) read(stub shim.ChaincodeStubInterface, args []string) ([]byte, error) {
	fcn := args[0]
	if fcn == "read" {
		valAsbytes, err := stub.GetState(event_key)
		if err != nil {
			jsonResp := "{\"Error\":\"Failed to get state for " + args[1] + "\"}"
			return nil, errors.New(jsonResp)
		}
		return valAsbytes, nil
	}

	return nil, nil
}
