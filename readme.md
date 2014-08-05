## Example App for OpenLogix

This is an example app that allows users to use an address to create a parking lot at the address. I live in downtown Ann Arbor, on game and event days a lot of people rent out their lawns as parking lot. The idea is to use the geocoding api to find addresses and allow users to reserve.

Unfortunately I made a few big mistakes in setting this up. One, I used AngularJS when after reviewing the spec again I see that I should probably have used Blade templates. Two, building on that issue with AngularJS it required additional set up that took the time I had and reduced it. I ended up wasting too much time on setting up my build tool. In hindsight I should have just used Bootstrap from a CDN and Blade templating. Needless to say I'm not terribly proud of this application. That being said I did build it in only about two and a half hours including setting up Laravel, GulpJs and my dev environment.
