import React from "react";
import { StyleSheet, Text, View, StatusBar } from "react-native";
import Route from "./src/routes";
import FetchLocation from "./src/components/fetchlocation";
import Routes from "./src/routes";

import MapView from "react-native-maps";
import { Ionicons } from "@expo/vector-icons";

export default function App() {
  // getUserLocationHandler=()=>{
  // navigator.geolocation.getCurrentPosition(
  //   //Will give you the current location
  //  (position) => {
  //   const currentLongitude = JSON.stringify(position.coords.longitude);
  //       //getting the Longitude from the location json
  //  const currentLatitude = JSON.stringify(position.coords.latitude);
  //  //getting the Latitude from the location json
  //   },
  // (error) => alert(error.message),
  // {
  //     enableHighAccuracy: true, timeout: 20000, maximumAge: 1000
  // }
  //  );

  //   }<FetchLocation onGetLocation={this.getUserLocationHandler}/>

  return (
    <View style={styles.container}>
      <StatusBar backgroundColor="red" barStyle="light-content" />

      <Routes />
    </View>
  );
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#FF8A65",
    justifyContent: "center",
  },
});
