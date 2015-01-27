package org.bindos.rest;

import javax.net.ssl.SSLEngineResult.Status;

import twitter4j.TwitterFactory;
import twitter4j.auth.AccessToken;

public class Main {

	public static void main(String args[]) throws Exception{
	    // The factory instance is re-useable and thread safe.
	    TwitterFactory factory = new TwitterFactory();
	    AccessToken accessToken = loadAccessToken(Integer.parseInt(args[0]));
	    Twitter twitter = factory.getInstance();
	    twitter.setOAuthConsumerKey("XqFfYv10yTHujuG7xWIJIhibC", "tVe6O4Y6XZj0QseSqPa9NdztFUV8ytykIGAZgykdMaaVqkyfwg");
	    twitter.setOAuthAccessToken(accessToken);
	    Status status = twitter.updateStatus(args[1]);
	    System.out.println("Successfully updated the status to [" + status.getText() + "].");
	    System.exit(0);
	  }
	  private static AccessToken loadAccessToken(int useId){
	    String token ="286183022-utrJWAyRy3ZtAFSyfvC9Pruw96sTO9193vXQ56dJ"; // load from a persistent store
	    String tokenSecret = "yfKN8TqX7Wg4DXjl6C4BhrHCSsKNlLa9aaReJRgXR5bBZ";// load from a persistent store
	    return new AccessToken(token, tokenSecret);
	  }
}