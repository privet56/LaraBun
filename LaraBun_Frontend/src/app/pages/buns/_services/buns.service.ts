import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

// App import
import { environment } from '../../../../environments/environment';
import { Bun } from '../bun';
import { HttpErrorHandler, HandleError } from '../../../shared/_services/http-handle-error.service';

@Injectable({
  providedIn: 'root'
})
export class BunsService {
  private readonly apiUrl = environment.apiUrl;
  private bunsUrl = this.apiUrl + '/buns';
  private handleError: HandleError;

  constructor(
    private http: HttpClient,
    httpErrorHandler: HttpErrorHandler ) {
      this.handleError = httpErrorHandler.createHandleError('BunsService');
    }

  /** GET buns from buns endpoint */
  getBuns (): Observable<Bun[]> {
    return this.http.get<Bun[]>(this.bunsUrl)
      .pipe(
        catchError(this.handleError('getBuns', []))
      );
  }

  /** GET bun detail from bun-detail endpoint */
  getBunDetail (id: number): Observable<Bun[]> {
    return this.http.get<Bun[]>(this.bunsUrl + `/${id}`)
      .pipe(
        catchError(this.handleError('getBunDetail', []))
      );
  }

  /** POST bun to buns endpoint */
  addBun (bun: Bun): Observable<Bun> {
    return this.http.post<Bun>(this.bunsUrl, bun)
      .pipe(
        catchError(this.handleError('addBun', bun))
      );
  }

  /** PUT bun to buns endpoint */
  updateBun (id: number, bun: Bun): Observable<Bun> {
    return this.http.put<Bun>(this.bunsUrl + `/${id}`, bun)
      .pipe(
        catchError(this.handleError('updateBun', bun))
      );
  }

  /** DELETE bun bun endpoint */
  deleteBun (id: number): Observable<any> {
    return this.http.delete<Bun>(this.bunsUrl + `/${id}`)
      .pipe(
        catchError(this.handleError('deleteBun'))
      );
  }

  /** Vote on bun */
  voteOnBun (vote: number, bun: number): Observable<any> {
    const rating = vote;
    return this.http.post(this.bunsUrl + `/${bun}/ratings`, {rating})
      .pipe(
        catchError(this.handleError('voteOnBun', []))
      );
  }
}
