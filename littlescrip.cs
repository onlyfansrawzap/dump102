using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class littlescrip : MonoBehaviour {

	public AudioSource rndsource;
	public AudioClip[] clip; //table of many clips[]
	// Use this for initialization
	void Start () {
		rndsource = FindObjectOfType<AudioSource>();
		rndsource.loop = false;
	}
	public AudioClip rndclip(){
		return clip[Random.Range(0, clip.Length)];
	}
	
	// Update is called once per frame
	void Update () {
		
	}

	void OnGUI()
	{

		if (GUI.Button (new Rect (10, 70, 50, 30), "Playa")) {
			Debug.Log ("Clicked the button with text");
			//if (!rndsource.isPlaying) {
				rndsource.clip = rndclip ();
				rndsource.Play ();

			//}
		}
		if (GUI.Button (new Rect (10, 90, 70, 30), "Stoob")) {
			Debug.Log ("Clicked the button with text");
			rndsource.Stop ();
		}
		if (GUI.Button(new Rect(10, 110, 50, 30), "Eskit"))
			Debug.Log("Clicked the button with text");
		if (GUI.Button(new Rect(10, 130, 100, 30), "Change reim"))
			Debug.Log("Clicked the button with text");
		if (GUI.Button(new Rect(10, 150, 150, 30), "Go too A"))
			Debug.Log("Clicked the button with text");
		if (GUI.Button(new Rect(10, 170, 150, 30), "Go too P"))
			Debug.Log("Clicked the button with text");
		if (GUI.Button(new Rect(10, 190, 180, 30), "Fancy of ATM only"))
			Debug.Log("Clicked the button with text");
		if (GUI.Button(new Rect(10, 210, 250, 30), "Illness arrivals"))
			Debug.Log("Clicked the button with text");
		
	}

}
