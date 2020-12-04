import { Auth } from './../models/auth';
import { AngularFirestore, DocumentReference, AngularFirestoreCollection } from '@angular/fire/firestore';
import { Injectable } from '@angular/core';
import { AngularFireAuth } from '@angular/fire/auth';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private authCollection: AngularFirestoreCollection<Auth>
  public userData$: Observable<firebase.User>

  constructor(private afsAuth: AngularFireAuth, private db: AngularFirestore) {
    this.authCollection = db.collection<Auth>('usuarios');
   }

  private authCollectionName = "usuarios";

  public getAllUsers(): Observable<Auth[]> {
    return this.db
      .collection('usuarios')
      .snapshotChanges()
      .pipe(
        map(actions =>
          actions.map(a => {
            const data = a.payload.doc.data() as Auth;
            const id = a.payload.doc.id;
            return { id, ...data };
          })
        )
      );
  }

  public deleteUsuarioById(auth:Auth) {
    this.afsAuth.auth.currentUser.delete()
    return this.authCollection.doc(auth.id).delete();
  }

  public editUsuarioById(auth:Auth) {
    return this.authCollection.doc(auth.id).update(auth);
  }

  saveUser(auth: Auth): Promise<DocumentReference> {
    return this.db.collection(this.authCollectionName).add(auth);
  }
  
  registerUser(auth: Auth) {
    return new Promise ((resolve, reject) => {
      this.afsAuth.auth.createUserWithEmailAndPassword(auth.email, auth.password)
      .then(userData => resolve(userData),
      err => reject(err));
    });
   }
  loginEmailUser(email: string, pass: string) {
    return new Promise((resolve, reject)=>  {
      this.afsAuth.auth.signInWithEmailAndPassword(email, pass)
        .then( userData => resolve(userData),
        err => reject (err));
    });
   }
  logoutUser() {
    return this.afsAuth.auth.signOut();
   }

  isAuth() {
    return this.afsAuth.authState.pipe(map(auth => auth));
  }

}

