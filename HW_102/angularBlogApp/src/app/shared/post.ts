import { Comment } from './comment';

export interface Post {
    id: number;
    title: string;
    body: string;
    comments: Comment[];
}