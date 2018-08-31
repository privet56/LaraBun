import { User } from './../auth/user';

export class Bun {
  id: number;
  name: string;
  desc: string;
  picture: string;
  user_id: number;
  average_rating?: number;
  user?: User;
  items?: any;
  ratings?: any;

  constructor() {}
}
