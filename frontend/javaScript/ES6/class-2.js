class Plane {
  constructor(numEngines) {
    this.numEngines = numEngines;
    this.enginesActive = false;
  }
  static badWeather(planes) {
    for (plane of planes) {
      plane.enginesActive = false;
    }
  }
  startEngines() {
    console.log('starting engines...');
    this.enginesActive = true;
  }
}

Plane.badWeather([plane1, plane2, plane3]);
